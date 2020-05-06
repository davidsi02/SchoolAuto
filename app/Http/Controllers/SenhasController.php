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
      $ndiasmax = 7; // N.º dias que querem que "apareça"
      $currentdate = time();
      $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');

      $senha = collect([['dataRefeicao' => date("Y-m-d", time()+86400), 'diasemana' => $diasemana[date("w",  time()+86400)]]]);

       $controlo = 2;
      for ($ndias=2;$ndias<=$ndiasmax;$ndias++){
       $dia_aux = time()+86400*$controlo;
       $diasemana_aux = date("w", $dia_aux);

      while ($diasemana_aux == 0 || $diasemana_aux == 6) {
          $dia_aux = time()+86400*(++$controlo);
          $diasemana_aux = date("w", $dia_aux);
       }
      ++$controlo;
      $senha->push(['dataRefeicao' => date("Y-m-d", $dia_aux), 'diasemana' => $diasemana[$diasemana_aux]]);
      }

     $senha=$senha->map(function($row) {
        return (object) $row;
      });

/*
$myCollection = collect([
    ['product_id' => 1, 'price' => 200, 'discount' => '50'],
    ['product_id' => 2, 'price' => 400, 'discount' => '50']
])->map(function($row) {
    return collect($row);
});
*/

/*
     $counter = 1;


     $dataRefeicao = date ("Y-m-d", strtotime('+'.$counter.' days'));

     $numdiaSemana = date('w', strtotime('+'.$counter.' days'));




 do{

   $dataRefeicao = date ("Y-m-d", strtotime('+'.$counter.' days'));

   $numdiaSemana = date('w', strtotime('+'.$counter.' days'));


     if ($numdiaSemana != 1 || $numdiaSemana != 7){

       $senha = collect([
          "dataRefeicao" => $dataRefeicao,
          "diasemana" => $diasemana[$numdiaSemana]
        ]);

      }

           $counter ++;
      //     echo $numsenhas = count($senha);

 } while ($counter < 8);

 echo count($senha);
*/

//    return view('user/dashboard', compact('senha', ['senha' => $senha]));
    return view('user/dashboard', compact('senha', $senha));

    }
    public function comprarSenhas(){


        // here i would like use foreach:


      if ($_GET['ds'] && $_GET['dr']) {
          $a = json_decode(stripslashes($_POST['a']));
          foreach($a as $d){

        echo $d;
      }
    }
  }
}
