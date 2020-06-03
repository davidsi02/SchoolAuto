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

if isset($_POST['DataInicio']) $botao1 = BotaoCarregamentosDiarios;
if isset($_POST['DataFim']) $botao1 = BotaoCarregamentosDiarios;
if isset($_POST['DataInicio']) $botao = BotaoCarregamentosPorData;
if isset($_POST['DataFim']) $botao = BotaoCarregamentosPorData;


if (isset($botao1])) {
       if (isset($_POST['DataInicio'] && $_POST['DataFim'])){
                $pesquisapordata = 1;

               $botao1 = $_POST['DataInicio'];
               $botao1 = $_POST['DataFim'];
      } else {
       if (isset($_POST['botaosemdatas'])){
                $pesquisapordata = 0;
       } else {
                       $_SESSION['erro'] = 1;
                   return redirect("/listagem");
       }


            if (BotaoCarregamentosDiarios == 1 ){
                        public function pdf2()
                         {
                           $pdf2 = \App::make('dompdf.wrapper');
                           $pdf2->loadHTML($this->cdthc());
                           return $pdf2->stream();
                         }:

          }

         if ($pesquisapordata == 1) {

         }

         if ($pesquisapordata == 0){
           $cgd = \DB::table('operacao', 'users')
                       ->where('nomeOperacao',  'Carregamento')
                       ->Where('dataOperacao', date('Y-m-d'))
                       ->orderBy('dataOperacao' , 'DESC')
                       ->get();
       return $cgd;

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

      }

}
