<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trajet;
use Session;
use App\User;
use App\Reservation;
use App\Http\Controllers\AuthController;
use Carbon\Carbon;

class TrajetController extends Controller
{
    public function trajet(){
        return view("trajet");
     }
    public function AddTrajet(Request $request){
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $request->validate([
            'villedep' =>'required',
            'villedes' =>'required',
            'nbp' =>'required',
            'marque'=>'required',
            'prix' =>'required',
            'date' =>'required'
        ]);
       $trajet = new Trajet();
       $trajet->villedep=$request->villedep;
       $trajet->villedes=$request->villedes;
       $trajet->nbp=$request->nbp;
       $trajet->marque=$request->marque;
       $trajet->prix=$request->prix;
       $trajet->date=$request->date;
       $trajet->heure=$request->heure;
       $trajet->name_user=$data->nom;
       $trajet->user_id=$data->id;
       $trajet->email=$data->email;
       $trajet->phone=$data->phone;
       $res=$trajet->save();
       if($res){
            return back()->with('success',"Trajet Ajouter avec Success.");
       }else{
        return back()->with('fail',"Trajet non ajoutée.");
       }
    }
    public function accueil(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view("trajet",compact('data'));
    }
    public function AllTrajet(){
        
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $users = User::all();
        $trajets = Trajet::all();
        $date=array();
        $date = Carbon::now()->format('Y-m-d');
        $trajet=array();
        $trajet=Trajet::where('date',$date)->get();
        $trajetaujordhui = Trajet::where('date',$date)->count();
        return view('accueil',compact('trajet','data','users','trajets','trajetaujordhui'));
    }
    public function search(Request $request){
        
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $trajett = Trajet::all()->where('villedep','=',$request->villedep)->where('villedes','=',$request->villedes)->where('date','=',$request->date);
        
        return view('/voiture',compact('trajett','data'));
    }
    public function reserver(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        $trajet=array();
        $trajet=Trajet::where('user_id',$data->id)->get();
       $result = new Reservation();
       $result->id_user=$data->id;
       $result=$result->save();
       return redirect('profile');
    }
}
