@extends('layouts.app')

@if(Auth::user()->tipoUtilizador == 1))

html lang="en">


<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<title>SCHOOLAUTO - Área de Utilizador</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />







</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="{{asset('assets/images/dsc-0066-source-1500x1000.jpg')}}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="https://www.etpsico.pt" class="simple-text">
                    SCHOOLAUTO - ETP SICÓ
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="/dashboard">
                        <i class="pe-7s-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href='/user'>
                        <i class="pe-7s-user"></i>
                        <p>Conta</p>
                    </a>
                </li>
                <li>
                    <a href="/transactions">
                        <i class="pe-7s-note2"></i>
                        <p>Movimentos</p>
                    </a>
                </li>
								@if(Auth::user()->tipoUtilizador == 1)
								<li class="active">
                    <a href="/apanel">
                        <i class="nc-key-25"></i>
                        <p>Painel Administrativo</p>
                    </a>
                </li>

								@endif

				<li class="active-pro" action = "{{ route('logout') }}">
                    <a href="{{ url('/logout') }}">
                        <i class="pe-7s-power"></i>
                        <p>Sair</p>
												@csrf
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Saldos e Movimentos</h4>
                                <p class="category"></p>


                            </div>
                            <div class="content">

															   <div>

															 </div>

                                <div class="footer">
                                    <div class="legend">

                                    </div>

                                    <hr>
                                    <div class="footer">
                                        <i class=""></i>



																			                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"></h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">

                                </div>
                                <div class="footer">
                                    <div class="legend">




                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> */php*/
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>


                                                </td>

        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.etpsico.pt">SCHOOLAUTO</a> por David Simões, Alexandre Lopes e Bruno Freitas.
                </p>
            </div>
        </footer>

    </div>
</div>


</body>


























@else
  @return view('/dashboard')

   @endif
