<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; use
Illuminate\Http\Request; use Illuminate\Support\Facades\Auth;
use Hash;
use SessionHandler;

class CardAuthController extends Controller {

    /** * Display a listing of the resource. * * @return
    /*\Illuminate\Http\Response */

    public function cardLogin() {

session_start();

    $numCartao = $_GET['input'];

      $verificanumCartao = DB::table('users')->
      where('numCartao', $numCartao) ->
      value('numCartao');

      $verificaID = DB::table('users')->
      where('numCartao',$numCartao) -> value('id');

      $verificaEmail =DB::table('users')->
      where('numCartao', $numCartao) ->
      value('email');

       //echo $verificaPassword;

               if ($verificanumCartao != NULL){
                           $_SESSION['uid'] = $verificaEmail;
                                     return view('sae/saelogin-password');



               } else { ?>

                  <script lang="js"> alert("Erro 01: Cartão não ativado! Contacte
               os Serviços Administrativos");
                 </script>

                  <?php

                 return view('sae/saelogin');
               }

    }

   public function pswVerify() {

        session_start();

        $password = $_POST['psw'];
        $id = $_SESSION['uid'];

           if(Auth::attempt(['email' => $id,
                             'password' => $password])){

                           $_SESSION["loginmethod"] = 'sae';
                           echo "Password Correta";
                           return redirect('/permissions');

     }else{

          ?> <script>

                alert("Password Incorreta!");

           </script>


          <?php

                     return view('/sae/saelogin');
     }

  }


  }
