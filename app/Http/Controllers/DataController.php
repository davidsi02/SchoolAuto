<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class DataController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function getUserType()
   {
       $nomeTipoUtilizador = DB::table('tipoutilizador')->where('tipoUtilizador', Auth::user()->tipoUtilizador) -> value('nomeTipoUtilizador');
       return view('user/user', ['nomeTipoUtilizador' => $nomeTipoUtilizador]);
   }

   public function changeColor()
   {
      session_start();



      if (isset ($_POST['red'])) $color = 'red';
      if (isset ($_POST['orange'])) $color = 'orange';
      if (isset ($_POST['blue'])) $color = 'blue';
      if (isset ($_POST['azure'])) $color = 'azure';
      if (isset ($_POST['purple'])) $color = 'purple';
      if (isset ($_POST['green'])) $color = 'green';
      if (isset ($_POST['none'])) $color = NULL;

      \DB::table('users')->where('id',Auth::user()->id)->update(['uiColor'=> $color]);
      echo $color;

      return redirect('/configs');

   }

   public function getUserbyProcesso(){

     session_start();

      $_SESSION['pesquisa'] = 0;

       $numProcesso = $_GET['numProcesso'];
       $_SESSION['numProcesso'] = $numProcesso;
       $userdata = collect();

      $user = DB::table('users')->where('numProcesso', $numProcesso)->first();

      if (isset($user)){

           $_SESSION['pesquisa'] = 1;
           return view ('/sae/secretaria/gestaouser', ['user' => $user]);

      }else{

        $_SESSION['pesquisa'] = 0;

        echo $_SESSION['pesquisa'];

        return view ('/sae/secretaria/gestaouser');

      }



   }

   public function alterUser(){

        session_start();


       if (isset($_POST['email'])){
            $field = 'email';
            $value = $_POST['email'];
       }

       if (isset($_POST['isencaoSenha'])){
            $field = 'isencaoSenha';
            if  ($_POST['isencaoSenha'] == "1") $value = 1;
            if  ($_POST['isencaoSenha'] == "0") $value = 2;

       }

       if (isset($_POST['numProcesso'])){
            $field = 'numProcesso';
            $value = $_POST['numProcesso'];
       }



       if (isset($_POST['numCartao'])){
            $field = 'numCartao';
            $value = $_POST['numCartao'];
       }

       DB::table('users')-> where('numProcesso', $_SESSION['numProcesso']) -> update([$field => $value]);





   }

}
