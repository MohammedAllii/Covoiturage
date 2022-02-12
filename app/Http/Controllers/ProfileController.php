<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trajet;
use Session;
use App\User;
use App\Http\Controllers\AuthController;
use Hash;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    public function profile(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $trajett = Trajet::all()->where('user_id','=',$data->id)->count();
        $trajet = Trajet::all()->where('user_id','=',$data->id);
        return view('profile',compact('data','trajet','trajett'));
    }
    public function update(Request $request){
        $user = User::find($request->id);
        $user->nom=$request->nom;
       $user->email=$request->email;
       $user->age=$request->age;
       $user->phone=$request->phone;
       $user->password=Hash::make($request->password);
       if($request->hasfile('photo')){
           $destination='images/'.$user->photo;
           if(File::exists($destination)){
               File::delete($destination);
           }
        
           $file=$request->file('photo');
           $extension=$file->getClientOriginalExtension();
           $filename=time().'.'.$extension;
           $file->move('images/',$filename);
           $user->photo=$filename;
       }
       $user->update();
        
 return redirect('profile')->with('success','bravoooooo');
    }
    public function delete($id){
      $supp=Trajet::find($id);
      $supp->delete();
      return redirect('profile')->with('success','ouiiiiiii');
    }
    public function modifierTrajet($id){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $trajet=Trajet::where('id','=',$id)->get();
        return view('modifierTrajet',compact('data','trajet'));
    }
    public function updateTrajet(Request $request ){
        $posts = Trajet::where('id','=',$request->id)->update([
        'villedep'=>$request->villedep,
        'villedes'=>$request->villedes,
        'prix'=>$request->prix,
        'date'=>$request->date,
        'heure'=>$request->heure,
        'nbp'=>$request->nbp,
        'marque'=>$request->marque
        
        ]);
        return redirect('profile')->with('success','bravoooooo');

    }
    
}
    

