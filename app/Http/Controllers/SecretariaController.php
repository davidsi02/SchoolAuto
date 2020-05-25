<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use User;

class SecretariaController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function VeS(){
      $eS = DB::table('portaria')
            ->join('users', 'users.numCartao', '=', 'portaria.numCartao')
            ->orderBy('time','desc')->limit(4)->get();
      return $eS;
    }
    public function VeSfirst(){
      $eSfirst = DB::table('portaria')->orderBy('time','desc')->first();
      return $eSfirst;
    }

    public function EeS(){
      return view('sae/secretaria/home',['eS' => $this->VeS(),'eSfirst' => $this->VeSfirst()]);
    }
}
