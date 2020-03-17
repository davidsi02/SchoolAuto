<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminActionsController extends Controller
{

    /*
    * @return \Illuminate\Http\Response
    */

   public function PermissionsVrf (){

  $verificaPermAdm = DB::table('tipoUtilizador')->
  where('id', Auth::user()->id) ->
  value('permAdmin');

  $verificaPermSA = DB::table('tipoUtilizador')->
  where('id', Auth::user()->id) ->
  value('permSA');



  session_start();

    if ($verificaPermSA == 1) {
          $_SESSION['permSA'] = 1;
  }  else {
          $_SESSION['permSA'] = 0;

  }

  if ($verificaPermAdm == 1){
       $_SESSION['permAdm'] = 1;
  } else {
      $_SESSION['permAdm'] = 0;

  }

return view('/dashboard');                                              

   }
}
