<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class TransactionController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */


   public function fullTransactions()
   {
       $operacao = DB::table('operacao')->where('idUtilizador', Auth::user()->id)->orderBy('dataOperacao' , 'DESC')->get();
       return view('user/transactions', compact('operacao', ['operacao' => $operacao]));
   }

   public function compactTransactions()
   {
       $operacao = DB::table('operacao')->where('idUtilizador', Auth::user()->id)->orderBy('dataOperacao' , 'DESC')->limit(4)->get();
       return view('user/dashboard', compact('operacao', ['operacao' => $operacao]));
   }

//_Todas_As_Transações_//

   public function allTransactions()
   {
       $ops = \DB::table('operacao')
                   ->orderBy('dataOperacao' , 'DESC')
                   ->get();
   return $ops;

   }

   public function pdf()
   {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->cdth());
     return $pdf->stream();
   }

   public function cdth()
   {
     $ops= $this->allTransactions();
     $output = ' <h3 align="center">Transações</h3>
     <table width="80%" style="text-align:center;border-collapse: collapse; border: 0px;">
      <tr>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Id</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="10%">Valor da Operação</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="20%">Data da Operação</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Quantidade</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="15%"> Tipo de Operacao</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Id do Produto</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%"> Id do Utilizador</th>
      </tr>
     ';
     foreach($ops as $ops)
      {
       $output .= '
       <tr>
        <td style="text-align:center;border: 1px solid;">'.$ops->idOperacao.'</td>
        <td style="text-align:center;border: 1px solid;">'.$ops->valorOperacao.'</td>
        <td style="text-align:center;border: 1px solid;">'.$ops->dataOperacao.'</td>
        <td style="text-align:center;border: 1px solid;">'.$ops->quantidade.'</td>
        <td style="text-align:center;border: 1px solid;">'.$ops->nomeOperacao.'</td>
        <td style="text-align:center;border: 1px solid;">'.$ops->idProduto.'</td>
        <td style="text-align:center;border: 1px solid;">'.$ops->idUtilizador.'</td>

       </tr>
       ';
      }
      $output .= '</table>';
      return $output;
   }

//_Refeições_Consumidas_//


   public function allRefeicoesConsumidas()
   {
       $rfc = \DB::table('consumorefeicao')
                   ->orderBy('dataConsumo' , 'DESC')
                   ->get();
   return $rfc;

   }

   public function pdf1()
   {
     $pdf1 = \App::make('dompdf.wrapper');
     $pdf1->loadHTML($this->cdth1());
     return $pdf1->stream();
   }

   public function cdth1()
   {
     $rfc= $this->allRefeicoesConsumidas();
     $output1 = ' <h3 align="center">Refeições Consumidas</h3>
     <table width="80%" style="text-align:center;border-collapse: collapse; border: 0px;">
      <tr>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Id</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="10%">Numero de Processo</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="20%">Id da Refeição</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Data de Consumo</th>
      </tr>
     ';
     foreach($rfc as $rfc)
      {
       $output1 .= '
       <tr>
        <td style="text-align:center;border: 1px solid;">'.$rfc->idConsumo.'</td>
        <td style="text-align:center;border: 1px solid;">'.$rfc->numProcesso.'</td>
        <td style="text-align:center;border: 1px solid;">'.$rfc->idRefeicao.'</td>
        <td style="text-align:center;border: 1px solid;">'.$rfc->dataConsumo.'</td>
       </tr>
       ';
      }
      $output1 .= '</table>';
      return $output1;
   }


   }
