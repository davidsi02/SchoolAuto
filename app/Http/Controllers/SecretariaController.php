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
            ->join('users', 'users.numCartao', '=', 'portaria.idUser')
            ->orderBy('time','desc')->limit(4)->get();
      return $eS;
    }
    public function VeSfirst(){
      $eSfirst = DB::table('portaria')->orderBy('time','desc')->first();
      return $eSfirst;
    }




    public function tasksPessoais(){
      $TP = \DB::table('tasks')->where('visibilidade',1)->where('tipo',1)->where('created_by',Auth::user()->numProcesso)->get();
      return $TP;
    }
    public function tasksPessoaisUpdated(){
      $TPU = DB::table('tasks')->where('visibilidade',1)->where('tipo',1)->where('created_by',Auth::user()->numProcesso)->orderBy('updated_at','desc')->value('updated_at');
      $TPU= \Carbon\Carbon::parse($TPU)->diffForHumans();
      if($TPU ==null) $TPU ='--';
      return $TPU;
    }


    public function tasksGerais(){
      $TG = \DB::table('tasks')->where('visibilidade',1)->where('tipo',0)->get();
      return $TG;
    }
    public function tasksGeraisUpdated(){
      $TGU = DB::table('tasks')->where('visibilidade',1)->where('tipo',0)->orderBy('updated_at','desc')->value('updated_at');
      $TGU= \Carbon\Carbon::parse($TGU)->diffForHumans();
      if($TGU==null) $TGU ='--';
      return $TGU;
    }




    public function tasksPessoaisAcabadas(){
      $TPA = \DB::table('tasks')->where('visibilidade',0)->where('tipo',1)->where('created_by',Auth::user()->numProcesso)->orderBy('updated_at','desc')->get();
      return $TPA;
    }
    public function tasksPessoaisAcabadasUpdated(){
      $TPAU = DB::table('tasks')->where('visibilidade',0)->where('tipo',1)->where('created_by',Auth::user()->numProcesso)->orderBy('updated_at','desc')->value('updated_at');
      $TPAU= \Carbon\Carbon::parse($TPAU)->diffForHumans();
      if($TPAU==null) $TPAU ='--';
      return $TPAU;
    }


    public function tasksGeraisAcabadas(){
      $TGA = \DB::table('tasks')->where('visibilidade',0)->where('tipo',0)->get();
      return $TGA;
    }
    public function tasksGeraisAcabadasUpdated(){
      $TGAU = DB::table('tasks')->where('visibilidade',0)->where('tipo',0)->orderBy('updated_at','desc')->value('updated_at');
      $TGAU= \Carbon\Carbon::parse($TGAU)->diffForHumans();
      if($TGAU==null) $TGAU ='--';
      return $TGAU;
    }





    public function EeS(){
      $TP = $this->tasksPessoais();
      $TG = $this->tasksGerais();
      $TPU = $this->tasksPessoaisUpdated();
      $TGU = $this->tasksGeraisUpdated();

      $TPA = $this->tasksPessoaisAcabadas();
      $TGA = $this->tasksGeraisAcabadas();
      $TPAU = $this->tasksPessoaisAcabadasUpdated();
      $TGAU = $this->tasksGeraisAcabadasUpdated();
      return view('sae/secretaria/home',['eS' => $this->VeS(),'eSfirst' => $this->VeSfirst(),'TP'=>$TP,'TG'=>$TG,'TPU' => $TPU,'TGU' =>$TGU,'TPA'=>$TPA,'TGA'=>$TGA,'TPAU' => $TPAU,'TGAU' =>$TGAU]);
    }
    public function remTask(){
      echo $_POST['id'];
      if (isset($_POST['id'])) {
        \DB::table('tasks')->where('idTask', $_POST['id'])->update(['visibilidade'=> 0]);
        return  redirect('secretaria');
      }

    }  public function atlTask(){
        echo $_POST['id'];
        if (isset($_POST['id'])) {
          \DB::table('tasks')->where('idTask', $_POST['id'])->delete();
          return  redirect('secretaria');
        }else{

        }

      }
}
