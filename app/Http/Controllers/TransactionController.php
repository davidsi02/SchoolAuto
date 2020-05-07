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
       $ops = \DB::table('operacao', 'users')
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
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Numero de Processo</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Nome do Utilizador</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Nome do Produto</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Quantidade</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="10%">Valor da Operação</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="15%">Tipo de Operacao</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="20%">Data da Operação</th>
      </tr>
     ';
     foreach($ops as $ops)
      {
        $numProcUser= \DB::table('users')->where('id',$ops->idUtilizador) ->first();
        $userOperacao = \DB::table('users')->where('id',$ops->idUtilizador)->first();
        $product = \DB::table('produtos')->where('id',$ops->idProduto)->first();

       $output .= '
       <tr>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$numProcUser->numProcesso.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$userOperacao->name.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$product->nomeProduto.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$ops->quantidade.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$ops->valorOperacao.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$ops->nomeOperacao.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$ops->dataOperacao.'</td>
       </tr>
       ';
      }
      $output .= '</table>';
      return $output;
   }

//_Refeições_Consumidas_//


   public function allRefeicoesConsumidas()
   {
       $rfc = \DB::table('consumorefeicao', 'users')
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
     $output1 = '<h3 align="center">Listagem das Refeições</h3>
     <table width="80%" style="text-align:center;border-collapse: collapse; border: 0px;">
      <tr>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Id Consumo</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="10%">Numero de Processo</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="40%">Nome do Aluno</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="30%">Data da Senha</th>
    <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Data de Consumo</th>

      </tr>
     ';
     foreach($rfc as $rfc)
      {
       $user = \DB::table('users')->where('numProcesso',$rfc->numProcesso)->first();

       $output1 .= '
       <tr>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfc->idConsumo.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfc->numProcesso.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$user->name.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfc->dataSenha.'</td>
        <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfc->dataConsumo.'</td>
       </tr>
       ';
      }
      $output1 .= '</table>';
      return $output1;
   }


   }
