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

  $shownotf = DB::table('notification')->where('tipoNotificacao', '!=' ,  10)->orderBy('date' , 'DESC')->limit(6)->get();
  return view('pageextensions/notifications', compact('shownotf', ['shownotf' => $shownotf]));

  $notificacao = collect([['codigo' => NULL]]);
   $contador;

 foreach (row as $shownotf){

if ($row -> type == 1) {

  $codigo = '<div class="alert alert-info alert-with-icon" data-notify="container">
      <button type="button" aria-hidden="true" class="close">×</button>
      <span data-notify="icon" class="pe-7s-bell"></span>
      <span data-notify="message"> <?php echo $content ?> </span>
      </div>';

  $content->push (['codigo' => $codigo]);

}

if ($row -> type == 4) {

  $codigo = '<div class="alert alert-danger alert-with-icon" data-notify="container">
      <button type="button" aria-hidden="true" class="close">×</button>
      <span data-notify="icon" class="pe-7s-bell"></span>
      <span data-notify="message"> <?php echo $content ?> </span>
  </div>';

  $content->push (['codigo' => $codigo]);

}

if ($row -> type == 2) {

  $codigo = '<div class="alert alert-warning alert-with-icon" data-notify="container">
      <button type="button" aria-hidden="true" class="close">×</button>
      <span data-notify="icon" class="pe-7s-bell"></span>
      <span data-notify="message"> <?php echo $content ?> </span>
  </div>';

  $content->push (['codigo' => $codigo]);

}

if ($row -> type == 3) {

  $codigo = '<div class="alert alert-success alert-with-icon" data-notify="container">
      <button type="button" aria-hidden="true" class="close">×</button>
      <span data-notify="icon" class="pe-7s-bell"></span>
      <span data-notify="message"> <?php echo $content ?> </span>
  </div>';

  $content->push (['codigo' => $codigo]);

}

  $contador++;

}

$content = $content->map(function ($row) {
return (object)$row;
});

return view ('user/notifications', compact('content', $content));

}



public function NotificationsTable(){



  $notf = DB::table('notification')->where('tipoNotificacao', '!=' ,  10)->orderBy('date' , 'DESC')->limit(30)->get();
  return view('pageextensions/notifications', compact('notf', ['notf' => $notf]));
}


}
