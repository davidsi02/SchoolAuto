<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PermissionController extends Controller
{

    /*
    * @return \Illuminate\Http\Response
    */

   public function PermissionsVrf (){

     @csfr;

  $verificaPermAdm = DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('Admin');

  $verificaPermSA = DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('SAE');

  $verificaAcessoBar = DB::table('permission')->
  where ('idUser', Auth::user()->id) ->
  value('AcessoBar');

  $verificaAcessoCantina = DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('AcessoCantina');

  $verificaAcessoBiblioteca =  DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('AcessoBiblioteca');

  $verificaAcessoPortaria =  DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('AcessoPortaria');



  session_start();



if (Auth::user()->tipoUtilizador == 1){

    $_SESSION['permAdmin'] = 1;
    $_SESSION['permSA'] = 1;

} else {
  switch ($verificaPermAdm) {
      case 0:
          $_SESSION['permAdmin'] = 0;
          break;
      case 1:
          $_SESSION['permAdmin'] = 1;
          break;
  }


  switch ($verificaPermSA) {
      case 0:
          $_SESSION['permSA'] = 0;
          break;
      case 1:
          $_SESSION['permSA'] = 1;
          break;
  }

  switch ($verificaAcessoCantina) {
      case 0:
          $_SESSION['AcessoCantina'] = 0;
          break;
      case 1:
          $_SESSION['AcessoCantina'] = 1;
          break;
  }

  switch ($verificaAcessoPortaria) {
      case 0:
          $_SESSION['AcessoPortaria'] = 0;
          break;
      case 1:
          $_SESSION['AcessoPortaria'] = 1;
          break;
  }

  switch ($verificaAcessoBar) {
      case 0:
          $_SESSION['AcessoBar'] = 0;
          break;
      case 1:
          $_SESSION['AcessoBar'] = 1;
          break;
  }

  switch ($verificaAcessoBiblioteca) {
      case 0:
          $_SESSION['AcessoBiblioteca'] = 0;
          break;
      case 1:
          $_SESSION['AcessoBiblioteca'] = 1;
          break;
  }

  if ($_SESSION['permAdmin'] == 1) {
    $_SESSION['permSA'] == 1;
  }

  if($_SESSION['permSA'] == 1){
            $_SESSION['AcessoCantina'] = 1;
            $_SESSION['AcessoPortaria'] = 1;
            $_SESSION['AcessoBar'] = 1;
            $_SESSION['AcessoBiblioteca'] = 1;
   }


}

if ($_SESSION['loginmethod'] == 'user'){
echo "UI";
return redirect('/dashboard');
 }

 return ("Incompleto!");
}
}
