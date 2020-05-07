<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class NotificationsController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
public function getUserNotification(){

session_start();

@csfr;

$content = $_POST['notcontent']; //Está triste ;(

   if (isset($_POST['suggestion'])) $type = 1;
   if (isset($_POST['error'])) $type = 2;

DB::table('notification')->insert(
  ['numProcesso' =>  Auth::user()->numProcesso,
  'content' => $content ,
  'tipoNotificacao' => $type
]);

return redirect('/configs');

}

}
/*
public function NotificationsTable(){

  $notf = DB::table('notification')->where('tipoNotificacao', != , '10')->orderBy('data' , 'DESC')->limit(30)->get();
  return view('pageextensions/notifications', compact('notf', ['notf' => $notf]));
}


}
