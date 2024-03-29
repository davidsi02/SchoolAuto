<?php
	 session_start();
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{asset('assets/web/assets/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/smooth-scroll/smooth-scroll.js')}}"></script>
	<script src="{{asset('assets/jarallax/jarallax.js')}}"></script>
	<script src="{{asset('assets/mobirise/js/script.js')}}"></script>
	<script src="{{asset('assets/senhas/script.js')}}"></script>


	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&subset=cyrillic,latin,greek,vietnamese">
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/animatecss/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/mobirise/css/style.css')}}">
	<link rel="stylesheet" href="{{(asset('assets/senhas/style.css'))}}">

	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link href="{{asset('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

	<!--  Light Bootstrap Table core CSS    -->
	<link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>

	<!-- Bootstrap core CSS     -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

	<!--   Core JS Files   -->
	<script src="{{asset('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>


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
									<a href="{{ url('/dashboard') }}">
											<i class="pe-7s-home"></i>
											<p>Dashboard</p>
									</a>
							</li>
							<li class="active">
									<a href="{{ url('/user') }}">
											<i class="pe-7s-user"></i>
											<p>Conta</p>
									</a>
							</li>
							<li>
									<a href="{{ url('/transactions') }}">
											<i class="pe-7s-note2"></i>
											<p>Movimentos</p>
									</a>
							</li>

											@if($_SESSION['permAdmin'] == 1)
							<li>
									<a href=" {{ url ('/apanel') }}">
											<i class="pe-7s-id"></i>
											<p>Painel Administrativo</p>
									</a>
							</li>
										 @endif




							<li class="active-pro">
								<a href="{{ url('/configs') }}">
											<i class="pe-7s-config"></i>
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

								<center>
				 <img src= "http://www.etpsico.pt/public/img/logos_entity.png" alt="" width=576 height=86 allign="middle">
								</center>

            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->  <!--Foto da escola no Background do Menu -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>
