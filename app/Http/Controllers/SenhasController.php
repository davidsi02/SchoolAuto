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
      if (isset($_GET['ndias'])) {
        $ndiasmax = $_GET['ndias']; // N.º dias que querem que "apareça"

      }else {
        $ndiasmax = 7; // N.º dias que querem que "apareça"
      }
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
       return (object)$row;
      });
      if ($ndiasmax==30) {
        return view('pageextensions/senhasExt', compact('senha', $senha));
      }else {
        return view('user/dashboard', compact('senha', $senha));

      }

      }
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

    public function comprarSenhas(){
      if(Auth::user()->tipoUtilizador == 3 || Auth::user()->isencaoSenha == 1) $preco = 0.00;
      if(Auth::user()->tipoUtilizador == 3 && Auth::user()->isencaoSenha != 1) $preco = 2.50;
      if(Auth::user()->tipoUtilizador != 3 && Auth::user()->isencaoSenha == 1) $preco = 0.00;
      if(Auth::user()->tipoUtilizador != 3 && Auth::user()->isencaoSenha == 0) $preco = 2.50;

            if ( Auth::user()->saldo - $preco*count($_GET['dr']) <0) {
              ?><script type="text/javascript">
              alert("Não tem saldo suficiente para efectuar esta transação!!")
              </script><?php
              header("Refresh:.25; url='/dashboard'");


            }else {
              \DB::table('users')->where('id', Auth::user()->id)->update(['saldo' =>  Auth::user()->saldo - $preco*count($_GET['dr'])]);
              foreach($_GET['dr'] as $dr) {

                \DB::table('consumorefeicao')->insert(
                  ['numProcesso' =>  Auth::user()->numProcesso,
                  'dataConsumo' => null,
                  'dataSenha' => $dr,
                ]);


                \DB::table('operacao')->insert(
                  ['valorOperacao' => -$preco,
                  'nomeOperacao' => 'Compra de senha',
                  'idProduto' => 101,
                  'idUtilizador' =>  Auth::user()->id,
                  'quantidade' => 1,
                ]);
              }
              return redirect('/dashboard');
            }

  }
  public function anularSenha(){


        DB::table('consumorefeicao')
          ->where('numProcesso',Auth::user()->numProcesso)
          ->where('dataSenha', $_GET['Anular'])
          ->delete();

      return redirect('/dashboard');
    }

}
