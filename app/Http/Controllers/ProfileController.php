<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trajet;
use Session;
use App\User;
use App\Http\Controllers\AuthController;
use Hash;


class ProfileController extends Controller
{
    public function profile(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view('profile',compact('data'));
    }
    public function update(Request $request){
        $post = User::where('id','=',$request->id)->update([
        'nom'=>$request->nom,
        'email'=>$request->email,
        'age'=>$request->age,
        'phone'=>$request->phone,
        'password'=>Hash::make($request->password)
        ]);
        if($post){
        return back()->with('success',"Bravooo");}
        else{
            return back()->with('fail',"Nooooon");}

        }

    }
    

