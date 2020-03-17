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

}
