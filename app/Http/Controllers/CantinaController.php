<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class CantinaController extends Controller
{

   public function indexCantina()
   {
     return view('shop/cantina',['senha' => 0]);
   }
   public function user($cart)
   {
     $user= \DB::table('users')->where('numCartao', $cart)->first();
     return $user;
   }

   public function verifySenha()
   {
     if ($_GET['input']!=null) {
       if (\DB::table('users')->where('numCartao', $_GET['input'])->first()) {
         $user=$this->user( $_GET['input']);
         $vrf = \DB::table('portaria')->where('numCartao',  $_GET['input'])->orderBy('idRegisto','desc') ->value('valor');
         if($vrf!=1) {
           echo '<script type="text/javascript">';
           echo ' alert("Não passou o cartão na portaria!!")';
           echo '</script>';
           header("Refresh:.25; url='refeitorio'");
         }else {
           if (\DB::table('consumorefeicao')->where('numProcesso', $user->numProcesso)->where('dataSenha', date('Y-m-d'))->first()) {

             if (\DB::table('consumorefeicao')->where('numProcesso',$user->numProcesso)->where('dataSenha', date('Y-m-d'))->where('dataConsumo','!=',null)->first()) {
               return view('shop/cantina', ['senha' => 2,'user'=>$user]);
             }else {
               \DB::table('consumorefeicao')->where('numProcesso', $user->numProcesso)->where('dataSenha', date('Y-m-d'))->update(['dataConsumo' => date('Y-m-d')]);

               return view('shop/cantina', ['senha' => 1,'user'=>$user]);
             }

           }else {
             return view('shop/cantina', ['senha' => 0,'user'=>$user]);
           }         }

       }else {
         echo '<script type="text/javascript">';
         echo ' alert("Não existe nenhum cartão acossiado a este número!!")';
         echo '</script>';
         header("Refresh:.25; url='refeitorio'");
       }
     }else{
       echo "Erro? Contactar administrador do sistema!!";
     }
   }


}
