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

             echo $_SESSION['colorchange'];

      if (isset ($_POST['red'])) $color = 'red';
      if (isset ($_POST['orange'])) $color = 'orange';
      if (isset ($_POST['blue'])) $color = 'blue';
      if (isset ($_POST['azure'])) $color = 'azure';
      if (isset ($_POST['purple'])) $color = 'purple';
      if (isset ($_POST['none'])) $color = NULL;

      DB::update('update users set uiColor = ?',[$color]);

      echo $color;

      return redirect('/configs');

   }

}
