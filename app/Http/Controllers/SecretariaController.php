<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use User;

class SecretariaController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function VeS(){
      $eS = DB::table('portaria')
            ->join('users', 'users.numCartao', '=', 'portaria.numCartao')
            ->orderBy('time','desc')->limit(4)->get();
      return $eS;
    }
    public function VeSfirst(){
      $eSfirst = DB::table('portaria')->orderBy('time','desc')->first();
      return $eSfirst;
    }


    public function tasksPessoais(){
      $TP = \DB::table('tasks')->where('visibilidade',1)->where('created_by',Auth::user()->numProcesso)->get();
      return $TP;
    }
    public function tasksPessoaisUpdated(){
      $TPU = DB::table('tasks')->where('visibilidade',1)->where('created_by',Auth::user()->numProcesso)->orderBy('updated_at','desc')->value('updated_at');
      $TPU= \Carbon\Carbon::parse($TPU)->diffForHumans();
      if($TPU=='1 second ago') $TPU ='--';
      return $TPU;
    }
    public function tasksGerais(){
      $TG = \DB::table('tasks')->where('visibilidade',0)->get();
      return $TG;
    }
    public function tasksGeraisUpdated(){
      $TGU = DB::table('tasks')->where('visibilidade',0)->orderBy('updated_at','desc')->value('updated_at');
      $TGU= \Carbon\Carbon::parse($TGU)->diffForHumans();
      if($TGU=='1 second ago') $TGU ='--';
      return $TGU;
    }
    public function EeS(){
      $TP = $this->tasksPessoais();
      $TG = $this->tasksGerais();
      $TPU = $this->tasksPessoaisUpdated();
      $TGU = $this->tasksGeraisUpdated();

      return view('sae/secretaria/home',['eS' => $this->VeS(),'eSfirst' => $this->VeSfirst(),'TP'=>$TP,'TG'=>$TG,'TPU' => $TPU,'TGU' =>$TGU]);
    }
    public function remTask($id){

      \DB::table('tasks')->where('idTask', $id)->delete();
      return  redirect('secretaria');
    }
}
