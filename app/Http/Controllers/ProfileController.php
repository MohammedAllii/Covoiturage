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
        $trajet = Trajet::all()->where('name_user','=',$data->nom);
        return view('profile',compact('data','trajet'));
    }
    public function update(Request $request){
        $post = User::where('id','=',$request->id)->update([
        'nom'=>$request->nom,
        'email'=>$request->email,
        'age'=>$request->age,
        'phone'=>$request->phone,
        'password'=>Hash::make($request->password)
        ]);
 
    }
    public function delete($id){
      $supp=Trajet::find($id);
      $supp->delete();
      return redirect('profile')->with('success','ouiiiiiii');
    }
}
    
