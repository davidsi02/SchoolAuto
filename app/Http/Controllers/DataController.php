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

      if ($_SESSION['colorchange'] = 1) $color = 'red';
      if ($_SESSION['colorchange'] = 2) $color = 'orange';
      if ($_SESSION['colorchange'] = 3) $color = 'blue';
      if ($_SESSION['colorchange'] = 4) $color = 'azure';
      if ($_SESSION['colorchange'] = 5) $color = 'purple';
      if ($_SESSION['colorchange'] = 6) $color = NULL;

      DB::update('update users set uiColor = ?',[$color]);

      echo $color;


   }

}
