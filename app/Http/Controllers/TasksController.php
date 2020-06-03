<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use User;

class TasksController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function novaTask(){

    session_start();

    @csfr;

    $content = $_POST['notcontent']; //Está triste ;(

       if (isset($_POST['pub'])) $visib = 0;
       if (isset($_POST['priv'])) $visib = 1;
       if(isset($visib)){
    DB::table('tasks')->insert(
      ['created_by' =>  Auth::user()->numProcesso,
      'conteudo' => $content ,
      'tipo' => $visib,
      'visibilidade' => 1

    ]);
    return redirect('/secretaria');

  }else{
    echo '<script type="text/javascript">';
    echo ' alert("Não foi possivel criar a tarefa!! Tente novamente!")';
    echo '</script>';
    header("Refresh:0; url='secretaria'");
  }

    }


}
