<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trajet;
use Session;
use App\User;
use App\Http\Controllers\AuthController;

class TrajetController extends Controller
{
    public function trajet(){
        return view("trajet");
     }
    public function AddTrajet(Request $request){
        $request->validate([
            'villedep' =>'required',
            'villedes' =>'required',
            'nbp' =>'required',
            'marque'=>'required',
            'prix' =>'required'
        ]);
       $trajet = new Trajet();
       $trajet->villedep=$request->villedep;
       $trajet->villedes=$request->villedes;
       $trajet->nbp=$request->nbp;
       $trajet->marque=$request->marque;
       $trajet->prix=$request->prix;
       $res=$trajet->save();
       if($res){
            return back()->with('success',"Sahiteeeek");
       }else{
        return back()->with('fail',"no no baby");
       }
    }
    public function accueil(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view("accueil",compact('data'));
    }
    public function AllTrajet(){
        $trajet=array();
        $trajet=Trajet::get();
        return view('accueil',compact('trajet'));
    }
}
