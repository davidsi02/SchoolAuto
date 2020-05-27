<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class ListagensController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */


//Carregamentos Efectuados//

      public function CarregamentosDiarios()
      {
          $cgd = \DB::table('operacao', 'users')
                      //->Where('nomeOperacao', =, 'Carregamento')//
                      ->orderBy('dataOperacao' , 'DESC')
                      ->get();
      return $cgd;

      }

      public function pdf2()
      {
        $pdf2 = \App::make('dompdf.wrapper');
        $pdf2->loadHTML($this->cdthc());
        return $pdf2->stream();
      }

      public function cdthc()
      {
        $cgd= $this->CarregamentosDiarios();
        $outputc = '<h3 align="center">Listagem das Refeições</h3>
        <table width="80%" style="text-align:center;border-collapse: collapse; border: 0px;">
         <tr>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Id Utilizador</th>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Número de Processo</th>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="23%">Nome do Utilizador</th>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Nome da Operação</th>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Data da Operação</th>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Valor da Operação</th>
         </tr>
        ';
        foreach($cgd as $cgd)
         {
          $user = \DB::table('users')->where('id',$cgd->idUtilizador)->first();
          $nproc = \DB::table('users')->where('numProcesso',$user->numProcesso)->first();

          $outputc .= '
          <tr>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->idUtilizador.'</td>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$nproc->numProcesso.'</td>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$user->name.'</td>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->nomeOperacao.'</td>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->dataOperacao.'</td>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->valorOperacao.'</td>
          </tr>
          ';
         }
         $outputc .= '</table>';
         return $outputc;
      }



//Refeições Consumidas//

public function RefeicoesConsumidas()
{
    $rfco = \DB::table('consumorefeicao', 'users')
                ->orderBy('dataSenha' , 'DESC')
                ->get();
return $rfco;

}

public function pdf3()
{
  $pdf3 = \App::make('dompdf.wrapper');
  $pdf3->loadHTML($this->cdthrfco());
  return $pdf3->stream();
}

public function cdthrfco()
{
  $rfco= $this->RefeicoesConsumidas();
  $outputrfco = '<h3 align="center">Listagem das Refeições</h3>
  <table width="80%" style="text-align:center;border-collapse: collapse; border: 50px;">
   <tr>
 <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Número de Processo</th>
 <th style="text-align:center;border: 1px solid; padding:10px;" width="23%">Nome do Utilizador</th>
 <th style="text-align:center;border: 1px solid; padding:10px;" width="23%">Data Da Senha</th>
 <th style="text-align:center;border: 1px solid; padding:10px;" width="23%">Data de Consumo</th>
   </tr>
  ';
  foreach($rfco as $rfco)
   {

    $userRefeicaoConsumida = \DB::table('users')->where('numProcesso',$rfco->numProcesso)->first();


    $outputrfco .= '
    <tr>
     <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfco->numProcesso.'</td>
     <td style="text-align:center;border: 1px solid; padding:1px;">'.$userRefeicaoConsumida->name.'</td>
     <td style="text-align:center;border: 1px solid; padding:1px;">'.date('Y-m-d', strtotime($rfco->dataSenha)).'</td>
     <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfco->dataConsumo.'</td>
    </tr>
    ';
   }
   $outputrfco .= '</table>';
   return $outputrfco;
}

//Refeições não Consumidas//

public function RefeicoesNConsumidas()
{
    $rfnco = \DB::table('consumorefeicao', 'users')
                ->orderBy('dataSenha' , 'DESC')
                ->get();
return $rfnco;

}

public function pdf4()
{
  $pdf4 = \App::make('dompdf.wrapper');
  $pdf4->loadHTML($this->cdthrfnco());
  return $pdf4->stream();
}

public function cdthrfnco()
{
  $rfnco= $this->RefeicoesNConsumidas();
  $outputrfnco = '<h3 align="center">Listagem das Refeições</h3>
  <table width="80%" style="text-align:center;border-collapse: collapse; border: 50px;">
   <tr>
 <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Número de Processo</th>
 <th style="text-align:center;border: 1px solid; padding:10px;" width="23%">Nome do Utilizador</th>
 <th style="text-align:center;border: 1px solid; padding:10px;" width="23%">Data Da Senha</th>
 <th style="text-align:center;border: 1px solid; padding:10px;" width="23%">Data de Consumo</th>
   </tr>
  ';
  foreach($rfnco as $rfnco)
   {

    $userRefeicaoNConsumida = \DB::table('users')->where('numProcesso',$rfnco->numProcesso)->first();

    $outputrfnco .= '
    <tr>
     <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfnco->numProcesso.'</td>
     <td style="text-align:center;border: 1px solid; padding:1px;">'.$userRefeicaoNConsumida->name.'</td>
     <td style="text-align:center;border: 1px solid; padding:1px;">'.date('Y-m-d', strtotime($rfnco->dataSenha)).'</td>
     <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfnco->dataConsumo.'</td>
    </tr>
    ';
   }
   $outputrfnco .= '</table>';
   return $outputrfnco;
}

}
