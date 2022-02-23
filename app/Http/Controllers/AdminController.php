<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Trajet;
use App\Admin;
use Session;
use Hash;

use App\Reservation;

class AdminController extends Controller
{
    public function dashb(){
        
        return view("dashboard");
    }
    public function dashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data=Admin::where('id','=',Session::get('loginId'))->first();
        }
        return view('board',compact('data'));
    }

 //affichage tous les trajets et users   
    public function allusers(){
        $users = User::all();
        $data=array();
        if(Session::has('loginId')){
            $data=Admin::where('id','=',Session::get('loginId'))->first();
        }
    return view("Admin.allusers",compact('data','users'));    }
    public function alltrajets(){
        $trajets = Trajet::all();
        $data=array();
            if(Session::has('loginId')){
                $data=Admin::where('id','=',Session::get('loginId'))->first();
            }
          
                    return view('Admin.alltrajets',compact('trajets','data'));
    }

    //suppression user et trajet
    public function deletes($id){
        $supp=Trajet::find($id);
        $supp->delete();
        return redirect('alltrajets')->with('success','Suppression effectuer avec success');
      }
      public function deleteuser($id){
        $supp=User::find($id);
        $supp->delete();
        return redirect('allusers')->with('success','Suppression effectuer avec success');
      }

      //update trajets et users
      public function updateTrajet(Request $request,$ids ){
        $posts = Trajet::where('id','=',$ids)->update([
        'villedep'=>$request->villedep,
        'villedes'=>$request->villedes,
        'prix'=>$request->prix,
        'date'=>$request->date,
        'heure'=>$request->heure,
        'nbp'=>$request->nbp,
        'marque'=>$request->marque
        
        ]);
        return redirect('alltrajets')->with('success','bravoooooo');

    }

    public function dashboardd(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6|max:26'
        ]);
        $admin=Admin::where('email','=',$request->email)->where('password','=',$request->password)->first();
        if($admin){
            $request->Session()->put('loginId',$admin->id);
            $data=array();
            if(Session::has('loginId')){
                $data=Admin::where('id','=',Session::get('loginId'))->first();
            }
            $users = User::all();
            $trajets = Trajet::all();
            $reservation=Reservation::all();
            $trajett = Trajet::all()->where('user_id','=',$data->id)->count();
            $trajet = Trajet::all()->where('user_id','=',$data->id);
            
            return view("board",compact('data','users','trajets','reservation','trajet','trajett'));
                                }else{
                    return back()->with('fail',"no no ");

                }
            
                
            }


            public function updateuser($id){
                $data=array();
                if(Session::has('loginId')){
                    $data=Admin::where('id','=',Session::get('loginId'))->first();
                }
                $user=User::where('id','=',$id)->get();
                return view('modifieruser',compact('data','user'));
            }

            public function AlTrajet(){
                $trajets = Trajet::all();
        
          
                    return view('tous',compact('trajets'));
               
            }
            public function updateusers(Request $request){
                $user = User::find($request->id);
                $user->nom=$request->nom;
               $user->email=$request->email;
               $user->age=$request->age;
               $user->phone=$request->phone;
               $user->password=$request->password;
               if($request->hasfile('photo')){
                   $destination='images/'.$admin->photo;
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
               $data=array();
               if(Session::has('loginId')){
                   $data=Admin::where('id','=',Session::get('loginId'))->first();
               }
               $users = User::all();

               return view('Admin.allusers',compact('data','users'));
            }

            public function updateadmin(Request $request){
                $admin = Admin::find($request->id);
                $admin->nom=$request->nom;
               $admin->email=$request->email;
               $admin->age=$request->age;
               $admin->phone=$request->phone;
               $admin->password=$request->password;
               if($request->hasfile('photo')){
                   $destination='images/'.$admin->photo;
                   if(File::exists($destination)){
                       File::delete($destination);
                   }
                
                   $file=$request->file('photo');
                   $extension=$file->getClientOriginalExtension();
                   $filename=time().'.'.$extension;
                   $file->move('images/',$filename);
                   $admin->photo=$filename;
               }
               $admin->update();
               $data=array();
               if(Session::has('loginId')){
                   $data=Admin::where('id','=',Session::get('loginId'))->first();
               }
               return view('alltrajets',compact('data'));
            }
}
