<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class CardRedirectController extends Controller
{

    /*
    * @return \Illuminate\Http\Response
    */

   public function CardRedirect (){

     @csfr;

     session_start();

     if ($_SESSION['AcessoPortaria'] == 1 && $_SESSION['permAdmin'] != 1 && $_SESSION['permSA'] != 1){
             return redirect('/portaria');
     }

     if ($_SESSION['AcessoCantina'] == 1 && $_SESSION['permAdmin'] != 1 && $_SESSION['permSA'] != 1){
             return redirect('/refeitorio');
     }

     if ($_SESSION['AcessoBiblioteca'] == 1 && $_SESSION['permAdmin'] != 1 && $_SESSION['permSA'] != 1){

           $_SESSION['categoriaShop'] = 2;
           return redirect('/shop');
     }

     if ($_SESSION['AcessoBar'] == 1 && $_SESSION['permAdmin'] != 1 && $_SESSION['permSA'] != 1){

         $_SESSION['categoriaShop'] = 1;
         return redirect('/shop');
     }

     if ($_SESSION['permAdmin'] == 1){
         //return redirect('/areaselector');
     }

}
}
