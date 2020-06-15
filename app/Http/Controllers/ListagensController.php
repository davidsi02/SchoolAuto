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

 public function carregamentos()
  {
    if (isset($_GET['DI']) && isset($_GET['DF'])) {
      $DI=date('yy-m-d', strtotime($_GET['DI']));
      $DF=date('yy-m-d', strtotime($_GET['DF']));

        $cgd = \DB::table('operacao', 'users')
                    ->where('nomeOperacao',  'Carregamento')
                    ->whereBetween('dataOperacao', [$DI,$DF])
                    ->orderBy('dataOperacao' , 'DESC')
                    ->get();
        return $cgd;

      }else {
        $a=\Carbon\Carbon::today();
        $cgd = \DB::table('operacao')
                    ->where('nomeOperacao',  'Carregamento')
                    ->whereDate('dataOperacao', $a)
                    ->orderBy('dataOperacao' , 'DESC')
                    ->get();

                    return $cgd;
                   }

  }
         public function pdfCarregamentos()
          {
            $pdfCarregamentos = \App::make('dompdf.wrapper');
            $pdfCarregamentos->loadHTML($this->carregamentoInfo());
            return $pdfCarregamentos->stream();
          }
         public function carregamentoInfo()
         {
           $cgd= $this->carregamentos();

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
         }/*
         public function pdfRefeicoes()
          {
            $pdfRefeicoes = \App::make('dompdf.wrapper');
            $pdfRefeicoes->loadHTML($this->RefeioesInfo());
            return $pdfRefeicoes->stream();
          }
         public function RefeioesInfo()
         {
           $cgd=;
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
         }*/
}
