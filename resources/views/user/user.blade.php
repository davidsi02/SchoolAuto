@extends('layouts.app')

@if(isset(Auth::user()->email))

<?php
	 session_start();
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SCHOOLAUTO - Área do Utilizador</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-color= "<?php echo Auth::user()->uiColor ?>" data-image="{{asset('assets/images/dsc-0066-source-1500x1000.jpg')}}">


		<div class="sidebar-wrapper">
					<div class="logo">
							<a href="https://www.etpsico.pt" class="simple-text">
									SCHOOLAUTO - ETP SICÓ
							</a>
					</div>

					<ul class="nav">
							<li>
									<a href='/dashboard'>
											<i class="pe-7s-home"></i>
											<p>Dashboard</p>
									</a>
							</li>
							<li class="active">
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

							@if($_SESSION['permAdmin'] == 1)
			<li>
					<a href="/apanel">
							<i class="nc-key-25"></i>
							<p>Painel Administrativo</p>
					</a>
			</li>
						 @endif

							<li class="active-pro">
									<a href="/">
											<i class="nc-settings-gear-64"></i>
											<p>Configurações</p>
									</a>
							</li>


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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Dados</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Escola</label>
                                                <input type="text" class="form-control" disabled placeholder="Escola" value="ETP Sicó">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" disabled placeholder="Email" value='{{Auth::user()->email}}'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Saldo:</label>
                                                <input type="text" class="form-control" disabled placeholder="Saldo" value="{{Auth::user()->saldo}}€">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" action = {{'DataController@getUserType'}} >
                                                <label>Tipo Utilizador:</label>
                                                <input type="text" class="form-control" disabled placeholder="Erro!" value= '<?php
                                                                                                                             echo $nomeTipoUtilizador
																																																														                       ?>'>



																						</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Numero de Processo:</label>
                                                <input type="text" class="form-control" disabled placeholder="NProcesso" value='{{Auth::user()->numProcesso}}'>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Numero do Cartão de Acesso:</label>
                                                <input type="text" class="form-control" disabled placeholder="nCartao" value="{{Auth::user()->numCartao}}">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="{{Auth::user()->path_fotografia}}" alt="..."/>

                                      <h4 class="title">{{Auth::user()->name}}<br />
                                         <small>{{Auth::user()->numProcesso}}</small>
                                      </h4>
                                    </a>
                                </div>

                            </div>
                            <hr>

                        </div>
                    </div>

                </div>
            </div>
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

</html>

@else
<script> window.location = "/login";</script>
@endif
