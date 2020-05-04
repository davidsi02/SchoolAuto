<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class SenhasController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function showSenha(){

      $currentdate = time();
      $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');

     $counter = 1;


     $dataRefeicao = date ("Y-m-d", strtotime('+'.$counter.' days'));

     $numdiaSemana = date('w', strtotime('+'.$counter.' days'));

     $senha = collect([
        "dataRefeicao" => $dataRefeicao,
        "diasemana" => $diasemana[$numdiaSemana]
      ]);


 do{

   $dataRefeicao = date ("Y-m-d", strtotime('+'.$counter.' days'));

   $numdiaSemana = date('w', strtotime('+'.$counter.' days'));


     if ($numdiaSemana != 1 || $numdiaSemana != 7){

              $senha->put($dataRefeicao, $diasemana[$numdiaSemana]);

      }

           $counter ++;
           echo $numsenhas = count($senha);

 } while ($counter < 8);

     return view('user/dashboard', compact('senha', ['senha' => $senha]));

    }

  }
