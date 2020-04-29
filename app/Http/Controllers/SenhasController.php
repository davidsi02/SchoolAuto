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
  public function AddSenha(){

       $currentTime = time();
       $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado');
       $diasemana_criar = date ("Y-m-d", strtotime('+1 week'));

       $numdiaSemana_atual = date('w', strtotime($currentTime));

       $numdiaSemana_criar = date('w', strtotime('+1 week'));

       echo 'Dia de Hoje = '.date('d-m-Y').'</br>';
       echo 'Senha a Criar ='.date('d-m-Y', strtotime('+1 week')).'</br>';
       echo $diasemana[$numdiaSemana_atual].'</br>';
       echo $diasemana[$numdiaSemana_criar].'</br>';

       $vrf = DB::table('refeicao')->where('dataRefeicao', $diasemana_criar)->first();

       if ($numdiaSemana_criar != 6 && $numdiaSemana_criar != 7 && $vrf == NULL){

             DB::table('refeicao')->insert(
                     ['dataRefeicao' => $diasemana_criar,
                     'diasemana' => $diasemana[$numdiaSemana_criar]
                   ]);

                   echo "Senha criada com sucesso!";
       } else {
                 if ($vrf != NULL){
                           echo "A senha para o dia ".$diasemana_criar." já foi criada.".'</br>';
                }
         }
       }

    public function showSenha(){

      $dataatual = date ("Y-m-d");

      $senha = DB::table('refeicao')->where('dataRefeicao', '>', $dataatual )->orderBy ('dataRefeicao' , 'ASC')->limit(7)->get();
      return view('user/dashboard', compact('senha', ['senha' => $senha]));

    }

  }
