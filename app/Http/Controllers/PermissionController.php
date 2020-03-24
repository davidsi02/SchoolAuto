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

     session_start();

  $_SESSION['permAdmin'] = DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('Admin');

  if ($_SESSION['permAdmin'] == 1 || Auth::user()->tipoUtilizador == 1) {
    $_SESSION['permAdmin'] = 1;
    $_SESSION['permSA'] == 1;
    $_SESSION['AcessoCantina'] = 1;
    $_SESSION['AcessoPortaria'] = 1;
    $_SESSION['AcessoBar'] = 1;
    $_SESSION['AcessoBiblioteca'] = 1;

 } else {

  $_SESSION['permSA'] = DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('SAE');

  if($_SESSION['permSA'] == 1){
    $_SESSION['AcessoCantina'] = 1;
    $_SESSION['AcessoPortaria'] = 1;
    $_SESSION['AcessoBar'] = 1;
    $_SESSION['AcessoBiblioteca'] = 1;
  } else {

  $_SESSION['AcessoBar'] = DB::table('permission')->
  where ('idUser', Auth::user()->id) ->
  value('AcessoBar');

  $_SESSION['AcessoCantina'] = DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('AcessoCantina');

  $_SESSION['AcessoBiblioteca'] =  DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('AcessoBiblioteca');

  $_SESSION['AcessoPortaria'] =  DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('AcessoPortaria');
}

}

if ($_SESSION['loginmethod'] == 'user'){
echo "UI";
return redirect('/dashboard');
 }

 return ("Incompleto!");
}
}
