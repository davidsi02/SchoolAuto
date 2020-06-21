<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class PermissionController extends Controller
{

    /*
    * @return \Illuminate\Http\Response
    */

   public function PermissionsVrf (){

     @csfr;

     session_start();


     $_SESSION['permAdmin'] = 0;
     $_SESSION['AcessoCantina'] = 0;
     $_SESSION['AcessoPortaria'] = 0;
     $_SESSION['AcessoBar'] = 0;
     $_SESSION['AcessoBiblioteca'] = 0;

  $_SESSION['permAdmin'] = DB::table('permission')->
  where('idUser', Auth::user()->id) ->
  value('Admin');

  if ($_SESSION['permAdmin'] == 1 || Auth::user()->tipoUtilizador == 1) {
    $_SESSION['permAdmin'] = 1;
  //  $_SESSION['permSA'] == 1;
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

return redirect('/dashboard');

} else {

return redirect('/redirect');


}
}

public function getPermissions (){


  $_SESSION['pesquisa'] = 0;

  $numProcesso = $_GET['numProcesso'];
  $userperms = collect();

   $user = DB::table('users')->where('numProcesso', $numProcesso)->first();

   $perms = DB::table('permission')
     -> join('users', 'permission.idUser', '=', 'users.id')
     -> where('users.numProcesso', $_GET['numProcesso'])
     ->first();


if (isset($user)){

  session(['uid' => $user->id]);



     if (isset($perms)){

          $_SESSION['pesquisa'] = 1;

          return view ('/admin/gestperms', ['perms' => $perms]);


}else{

            DB::table('permission')->insert([
                    ['idUser' => $user->id,]
              ]);

              $_SESSION['pesquisa'] = 1;

              return view ('/admin/gestperms', ['perms' => $perms]);


     }

} else {

                    $_SESSION['pesquisa'] = 0;
                      return view ('/admin/gestperms');


}

}


public function alterPermissions (){


       ///TESTES

if (isset($_POST['aportaria'])) $permPortaria = 1; else $permPortaria = 0;
if (isset($_POST['acantina'])) $permCantina = 1; else $permCantina = 0;
if (isset($_POST['abar'])) $permBar = 1; else $permBar = 0;
if (isset($_POST['abiblioteca'])) $permBiblioteca = 1; else $permBiblioteca= 0;
if (isset($_POST['sae'])) $permSAE = 1; else $permSAE = 0;
if (isset($_POST['admin'])) $permAdmin = 1; else $permAdmin = 0;
Session::regenerate();


$uid = session('uid');
@csfr;


    DB::table('permission') ->
    where('idUser', $uid)
    ->update([
    'acessoPortaria' => $permPortaria,
    'acessoCantina' => $permCantina,
    'acessoBar' => $permBar,
    'acessoBiblioteca' => $permBiblioteca,
    'sae' => $permSAE,
    'admin' => $permAdmin ])  ;

    $perms = DB::table('permission')
      -> join('users', 'permission.idUser', '=', 'users.id')
      -> where('idUser', $uid)
      ->first();

      $_SESSION['pesquisa'] = 1;

    return view('/admin/gestperms', ['perms' => $perms]);










}


}
