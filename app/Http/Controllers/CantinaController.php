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
}
