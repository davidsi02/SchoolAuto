<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class CantinaController extends Controller
{

   public function indexCantina()
   {
     return view('shop/cantina',['senha' => 1]);
   }

   public function user()
   {
     $user=\DB::table('users')->where('numCartao', $_GET['input'])->first();
     return $user;
   }

   public function verifySenha(){
   if ($_GET['input']!=null) {
     if (\DB::table('users')->where('numCartao', $_GET['input'])->first()) {
       $user=$this->user();
       if (\DB::table('consumorefeicao')->where('numProcesso', $user->numProcesso)->where('dataSenha',  date('Y-m-d'))->first()) {
         if (\DB::table('consumorefeicao')->where('numProcesso', $user->numProcesso)->where('dataConsumo','!=' ,null)->first()) {
           return view('shop/cantina', ['senha' => 2,'user'=>$user]);
         }else {
           \DB::table('consumorefeicao')->where('numProcesso', $user->numProcesso)->where('dataSenha', date('Y-m-d'))->update(['dataConsumo' =>  date('Y-m-d')]);
           return view('shop/cantina', ['senha' => 1,'user'=>$user]);
         }
      }else {
        return view('shop/cantina',['senha' => 0,'user'=>$user]);
      }
     }else {
       echo '<script type="text/javascript">';
       echo ' alert("Não existe nenhum cartão acossiado a este número!!")';
       echo '</script>';
       header("Refresh:.25; url='refeitorio'");
     }
   }else{
     echo '<script type="text/javascript">';
     echo ' alert("????????")';
     echo '</script>';

   }
 }

}