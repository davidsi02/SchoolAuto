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

     if ($_SESSION['AcessoBar'] == 1){

         return redirect('/shop');

     }

}
}
