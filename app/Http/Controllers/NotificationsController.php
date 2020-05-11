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


public function showNotification(){

 echo 'aaaaa';


  $shownotf = DB::table('notification')->where('tipoNotificacao', '!=' ,  10)->orderBy('date' , 'DESC')->limit(6)->get();
  $notf = collect([['codigo' => NULL, 'content' => NULL]]);


 foreach ($shownotf as $row){

if ($row -> tipoNotificacao == 1) {

  $codigo = "alert alert-info alert-with-icon";

  $notf->push (['codigo' => $codigo, 'content' => $row -> content]);

}

if ($row -> tipoNotificacao == 4) {

  $codigo = "alert alert-danger alert-with-icon";

  $notf->push (['codigo' => $codigo, 'content' => $row -> content]);


}

if ($row -> tipoNotificacao == 2) {

  $codigo = "alert alert-warning alert-with-icon";

  $notf->push (['codigo' => $codigo, 'content' => $row -> content]);


}

if ($row -> tipoNotificacao == 3) {

  $codigo = "alert alert-success alert-with-icon";

  $notf->push (['codigo' => $codigo, 'content' => $row -> content]);


}


}

$notf = $notf->map(function ($row) {
return (object)$row;
});

return view ('admin/panel', compact('notf', $notf));

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function NotificationsTable(){



  $notf = DB::table('notification')->where('tipoNotificacao', '!=' ,  10)->orderBy('date' , 'DESC')->limit(30)->get();
  return view('pageextensions/notifications', compact('notf', ['notf' => $notf]));
}


}
