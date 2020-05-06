<?php
session_start();
?>

@if($_SESSION['permAdmin'] == 1)

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
									<li>
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
									<li class = 'active'>
											<a href=" {{ url ('/apanel') }}">
													<i class="nc-key-25"></i>
													<p>Painel Administrativo</p>
											</a>
									</li>
												 @endif




									<li class="active-pro">
											<a href="{{ url('/') }}">
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

		<div class="content" style="min-height:1px;padding: 0;padding-top:20">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">

							<div class="header">
								<h4 class="title">Saldos e Movimentos</h4>
								<p class="category"></p>
							</div>
							<div class="content">
								<div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<i class=""></i>

		<div class="content" style="min-height:1px;padding: 0;padding-top:20">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">

							<div class="header">
								<h4 class="title">Saldos e Movimentos</h4>
								<p class="category"></p>
							</div>
							<div class="content">
								<div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<i class=""></i>

		<div class="content" style="min-height:1px;padding: 0;padding-top:20">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">

							<div class="header">
								<h4 class="title">Listagens</h4>
								<p class="category"></p>
							</div>
							<div class="footer">
								<div class="legend">
								</div>
								<hr>
								<div class="footer">
									<i class=""></i>
								</div>
							</div>
							<div style="padding:20px;">
								<a href="{{ url('transações/pdf') }}" class="btn btn-danger" target="_blank" style="width:100%" >Listagem das Transações</a>
							</div>
						</br>
						  <div style="padding:20px;">
							<a href="{{ url('refeicoes_consumidas/pdf') }}" class="btn btn-danger" target="_blank" style="width:100%" >Listagem das Refeições Consumidas</a>
						  </div>
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

	</body>
	@else

	<script>
	alert("Não tem permissões para aceder à Area Restrita");
	window.location = "/dashboard";
	</script>

	@endif
