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

 public function carregamentos1()
  {
    if (isset($_GET['DI']) && isset($_GET['DF'])) {
      $DI=date('yy-m-d', strtotime($_GET['DI']));
      $DF=date('yy-m-d', strtotime($_GET['DF']));

      if (isset($_GET['NPCR'])) {
        $cgd = \DB::table('operacao', 'users')
                    ->join('users', 'operacao.idUtilizador', '=', 'users.id')
                    ->where('users.numProcesso', $_GET['NPCR'])
                    ->where('nomeOperacao',  'Carregamento')
                    ->whereBetween('dataOperacao', [$DI,$DF])
                    ->orderBy('dataOperacao' , 'DESC')
                    ->get();
                    echo $cgd;
                    echo '1';

        }else{
          $cgd = \DB::table('operacao', 'users')
                      ->where('nomeOperacao',  'Carregamento')
                      ->whereBetween('dataOperacao', [$DI,$DF])
                      ->orderBy('dataOperacao' , 'DESC')
                      ->get();
                      echo $cgd;
                      echo '2';

        }
    //    return $cgd;

      }else {
        if (isset($_GET['NPCR'])) {
        $a=\Carbon\Carbon::today();
        $cgd = \DB::table('operacao', 'users')
                    ->join('users', 'operacao.idUtilizador', '=', 'users.id')
                    ->where('users.numProcesso', $_GET['NPCR'])
                    ->where('nomeOperacao',  'Carregamento')
                    ->whereDate('dataOperacao', $a)
                    ->orderBy('dataOperacao' , 'DESC')
                    ->get();

echo $cgd;
echo '3';

}else{
  $a=\Carbon\Carbon::today();
  $cgd = \DB::table('operacao', 'users')
              ->where('nomeOperacao',  'Carregamento')
              ->whereDate('dataOperacao', $a)
              ->orderBy('dataOperacao' , 'DESC')
              ->get();
}
echo $cgd;
echo '4';

              //      return $cgd;
                   }
  }

   public function carregamentos()
    {

      if (isset($_GET['CarregamentosDT'])) {
          if (isset($_GET['DI']) && isset($_GET['DF'])) {
            $DI=date('yy-m-d', strtotime($_GET['DI']));
            $DF=date('yy-m-d', strtotime($_GET['DF']));
            $cgd = \DB::table('users')
                      ->join('operacao', 'operacao.idUtilizador', '=', 'users.id')
                        ->where('operacao.nomeOperacao',  'Carregamento')
                        ->whereBetween('operacao.dataOperacao', [$DI,$DF])
                        ->orderBy('operacao.dataOperacao' , 'DESC')
                        ->when($_GET['NPCR'], function ($cgd) {
                                return $cgd->where('users.numProcesso', $_GET['NPCR']);
                        })
                        ->get();
            return $cgd;
          }
      }
      if($_GET['CarregamentosDA']){
        $a=\Carbon\Carbon::today();
        $cgd = \DB::table('operacao', 'users')
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
             $nproc = \DB::table('users')->where('numProcesso',$user->numProcesso)->value('numProcesso');
             $outputc .= '
             <tr>
              <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->idUtilizador.'</td>
              <td style="text-align:center;border: 1px solid; padding:1px;">'.$nproc.'</td>
              <td style="text-align:center;border: 1px solid; padding:1px;">'.$user->name.'</td>
              <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->nomeOperacao.'</td>
              <td style="text-align:center;border: 1px solid; padding:1px;">'.date('d-m-Y', strtotime($cgd->dataOperacao)).'</td>
              <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->valorOperacao.'</td>
             </tr>
             ';
            }
            $outputc .= '</table>';
            return $outputc;
         }
         public function pdfRefeicoes()
          {
            $pdfRefeicoes = \App::make('dompdf.wrapper');
            $pdfRefeicoes->loadHTML($this->RefeioesInfo());
            return $pdfRefeicoes->stream();
          }
          public function RefData()
           {
             if (isset($_GET['DI']) && isset($_GET['DF'])) {
               $DI=date('yy-m-d', strtotime($_GET['DI']));
               $DF=date('yy-m-d', strtotime($_GET['DF']));            echo '1';

               if (isset($_GET['consumidas'])) {


                            $cgd = \DB::table('consumorefeicao')
                                        ->where('dataConsumo','!=' , null)
                                        ->whereBetween('dataSenha', [$DIR,$DFR])
                                        ->orderBy('dataConsumo' , 'DESC')
                                        ->get();
                                        echo '2';

          }
          if($_GET['Nconsumidas']){
              $cgd = \DB::table('consumorefeicao')
                          ->where('dataConsumo', null)
                          ->whereBetween('dataSenha', [$DIR,$DFR])
                          ->orderBy('dataConsumo' , 'DESC')
                          ->get();
                          echo '4';

              }
              echo '5';

            }

          }
          public function RefData1()
           {
             if (isset($_POST['DIR']) && isset($_POST['DFR'])) {
               $DIR=date('yy-m-d', strtotime($_POST['DIR']));
               $DFR=date('yy-m-d', strtotime($_POST['DFR']));
               if ($_POST['consumidas']==1) {

                 $cgd = \DB::table('consumorefeicao', 'users')
                             ->where('dataConsumo','!=' , null)
                             ->whereBetween('dataSenha', [$DIR,$DFR])
                             ->orderBy('dataConsumo' , 'DESC')
                             ->get();
                 return $cgd;

               }else {
                 $cgd = \DB::table('consumorefeicao', 'users')
                             ->where('dataConsumo', null)
                             ->whereBetween('dataSenha', [$DIR,$DFR])
                             ->orderBy('dataConsumo' , 'DESC')
                             ->get();
                 return $cgd;
               }
             }
          }
         public function RefeioesInfo()
         {
           $cgd=$this->RefData();
           echo '1';

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
             foreach($cgd as $cgd)
              {
               $user = \DB::table('users')->where('id',$cgd->idUser)->first();


               $output1 .= '
               <tr>
                <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->idConsumo.'</td>
                <td style="text-align:center;border: 1px solid; padding:1px;">'.$user->numProcesso.'</td>
                <td style="text-align:center;border: 1px solid; padding:1px;">'.$user->name.'</td>
                <td style="text-align:center;border: 1px solid; padding:1px;">'.date('d-m-Y', strtotime($cgd->dataSenha)).'</td>
                <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->dataConsumo.'</td>
               </tr>
               ';
              }
              $output1 .= '</table>';
              return $output1;
         }
}
