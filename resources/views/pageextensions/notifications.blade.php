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
						<div class="col-md-12">
							<div class="card">
								<div class="header">
									<h4 class="title">Listagem de Notificações</h4>
								</div>



								<div class="content table-responsive table-full-width"  action = {{('NotificationsController@NotificationsTable')}}>
									<table class="table table-hover table-striped">
										<thead>
											<th>Conteudo</th>
											<th>Data</th>
											<th>Nº Processo</th>
											<th>Tipo Notificação</th>
										</thead>
										<tbody>


											@foreach($notf as $row)
											<tr>
												<td>{{$row -> content}}</td>
												<td>{{$row -> date}}</td>
												<td>{{$row -> numProcesso}}</td>
												<td><?php if ($row -> tipoNotificacao == 1) echo 'Sugestão';
												if ($row -> tipoNotificacao == 2) echo 'Alerta';
												if ($row -> tipoNotificacao == 3) echo 'Erro!';
												if ($row -> tipoNotificacao == 4) echo '';
												?>
											</td>
											<td></td>
										</tr>
										@endforeach


									</tbody>
								</table>

							</div>


							<form style="padding:20px 10px; padding-bottom:0px" action="{{ url('/apanel') }}" method="get">
								<input class="col-md-12 float-right	" type="submit"   value="Voltar">
								<input type="hidden" name="ndias" value="30">
							</form>



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

		</html>
