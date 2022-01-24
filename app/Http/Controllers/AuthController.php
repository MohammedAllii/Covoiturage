<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;

class AuthController extends Controller
{
    public function login(){
       return view("Auth.connexion");
    }
    public function registration(){
        return view("Auth.inscription");
    }
    public function logout(){
        if(Session::has('loginId')){
            Session()->forget('loginId');
            Session::flush();
            return redirect('/');
        }
     }
    public function inscription(Request $request){
       $request->validate([
           'nom' =>'required',
           'email' =>'required|email|unique:users',
           'age' =>'required',
           'password' =>'required|min:6|max:26'
       ]);
       $user = new User();
       $user->nom=$request->nom;
       $user->email=$request->email;
       $user->age=$request->age;
       $user->password=Hash::make($request->password);
       $res=$user->save();
       if($res){
            return back()->with('success',"Sahiteeeek");
       }else{
        return back()->with('fail',"no no baby");
       }
    }
    public function connexion(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6|max:26'
        ]);
        $user=User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->Session()->put('loginId',$user->id);
                return redirect('accueil');
            }else{
                return back()->with('fail','password incorrect!');
            }
        }else{
            return back()->with('fail','email invalid !');
        }
    }
    public function accueil(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view("accueil",compact('data'));
    }
}
