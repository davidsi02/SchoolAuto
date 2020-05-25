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


      public function RefeicoesConsumidas()
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
           <td style="text-align:center;border: 1px solid; padding:1px;">'.$rfc->dataConsumo.'</td>
          </tr>
          ';
         }
         $output1 .= '</table>';
         return $output1;
      }
    }

}
