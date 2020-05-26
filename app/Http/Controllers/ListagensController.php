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


//Carregamentos Efectuados//

      public function CarregamentosDiarios()
      {
          $cgd = \DB::table('operacao', 'users')
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
       <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Id Consumo</th>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="10%">Numero de Processo</th>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="40%">Nome do Aluno</th>
       <th style="text-align:center;border: 1px solid; padding:10px;" width="5%">Data de Consumo</th>

         </tr>
        ';
        foreach($cgd as $cgd)
         {
          $user = \DB::table('users')->where('id',$cgd->idUtilizador)->first();

          $outputc .= '
          <tr>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->idConsumo.'</td>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->numProcesso.'</td>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$user->name.'</td>
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$cgd->dataOperacao.'</td>
          </tr>
          ';
         }
         $outputc .= '</table>';
         return $outputc;
     }



//Refeições Consumidas e não Consumidas//


}
