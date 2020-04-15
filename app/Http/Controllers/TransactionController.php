<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

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

}
