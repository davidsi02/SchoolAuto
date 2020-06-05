<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PortariaController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
  public function acessoPortaria(){

        $numCartao = $_GET['input'];

        $vrf = DB::table('users')->
        where('numCartao', $numCartao) ->
        value('id');


         $valoranterior = DB::table('portaria')->
         where('idUser', $vrf) ->
         orderBy('idRegisto', 'DESC') -> value('valor');

         if (isset($vrf)){

             if ($valoranterior == NULL) $valor = 1;
             if ($valoranterior == 1) $valor = 2;
             if ($valoranterior == 2) $valor = 1;

               DB::table('portaria')->insert(
                 [
                 'idUser' => $vrf,
                 'valor' => $valor
               ]);


         } else {

                   session_start();

            $_SESSION['ERRO'] = 1;
            $errormessage = 'O numero de cartão '. $numCartao.' não está associado a nenhum utilizador!';


            DB::table('notification')->insert(
              [

              'content' => $errormessage,
              'tipoNotificacao' => 4
            ]);


         }

           return redirect ('/portaria');

  }

}
