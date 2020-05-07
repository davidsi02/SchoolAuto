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

DB::table('notification')->insert(
  ['numProcesso' =>  Auth::user()->numProcesso,
  'content' => $content ,
  'tipoNotificacao' => $_SESSION["submittype"]
]);

 ?>

<script type="text/javascript">

alert("Feedback recebido com sucesso! Obrigado!");

</script>

 <?php

return redirect('/configs');


}











    }
