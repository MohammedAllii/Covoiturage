<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trajet;
use App\Admin;
use App\Reservation;
use Hash;
use Session;
use Carbon\Carbon;


class AuthController extends Controller
{   public function home(){
    $users = User::all();
    $trajets = Trajet::all();
    $date=array();
    $date = Carbon::now()->format('Y-m-d');
    $trajet=array();
    $trajet=Trajet::where('date',$date)->get();
    $trajetaujordhui = Trajet::where('date',$date)->count();


        return view('Auth.home',compact('trajet','users','trajets','trajetaujordhui')); }

        public function chercher(Request $request){
            $trajett = Trajet::all()->where('villedep','=',$request->villedep)->where('villedes','=',$request->villedes)->where('date','=',$request->date);
            if($trajett){
            return view('Auth.chercher',compact('trajett'));}
            else{
                return back()->with('success',"bravo .");
            }
        }
        
        

                public function board(){
                        return view('board');
                }

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
            return redirect('cnx');
        }
     }
    public function inscription(Request $request){
       $request->validate([
           'nom' =>'required',
           'email' =>'required|email|unique:users',
           'age' =>'required',
           'phone'=>'required|min:8|max:8',
           'password' =>'required|min:6|max:26'
       ]);
       $user = new User();
       $user->nom=$request->nom;
       $user->email=$request->email;
       $user->age=$request->age;
       $user->phone=$request->phone;
       $user->password=Hash::make($request->password);
       if($request->hasfile('photo')){
           $file=$request->file('photo');
           $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('images/',$filename);
           $user->photo=$filename;
       }
       $res=$user->save();
       if($res){
            return back()->with('success',"Bravo");
       }else{
        return back()->with('fail',"no no ");
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
