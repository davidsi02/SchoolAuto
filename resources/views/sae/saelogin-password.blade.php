@extends('layouts.app')

@section('content')





 <script>

 </script>


<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.11.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="description" content="">

  <title>SCHOOLGEST | Login</title>

</head>
<body>
  <section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url(assets/images/dsc-0066-source-1500x1000.jpg);">
    <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-center">
        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
        <div class="mbr-box__container mbr-section__container container">
            <div class="mbr-box mbr-box--stretched"><div class="mbr-box__magnet mbr-box__magnet--center-center">
                <div class="row"><div class=" col-sm-12 col-sm-offset-2">
                    <div class="mbr-hero animated fadeInUp">
                        <h1 class="mbr-hero__text">SCHOOLAUTO ®<br>ETP SICÓ&nbsp;</h1>
                        <p class="mbr-hero__subtext"></p>
                    </div></div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12 offset-md-30">
                                <p class="mbr-hero__subtext"> Introduza a sua password</p>
                                <div class="card">
                                    <div class="card-body">

                                        <form method="POST" action = "/sae/password">
                                                  @csrf

                                                <div class="col-md-12">
                                                    <input style="text-align:center;" id="psw" type="password" name="psw" autofocus >

                                                </div>

                                              </form>



                                            </div>



            </div></div>
        </div>

    </div>
</section>

@endsection

@if (isset($_GET['ERROR']) && $_GET['ERROR'] == 1)

  <script>

alert("ERRO!");

  </script>

  @endif



</body>
