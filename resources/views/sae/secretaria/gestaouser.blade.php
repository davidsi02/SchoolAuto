<!doctype html>


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
</head>
<body>

	<div class="wrapper">
		<div class="sidebar" data-color="<?php echo Auth::user()->uiColor ?>" data-image="{{asset('assets/images/dsc-0066-source-1500x1000.jpg')}}">

			<!--

			Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
			Tip 2: you can also add an image using data-image tag

		-->

		<div class="sidebar-wrapper">
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text">
					SCHOOLAUTO - Secretaria
				</a>
			</div>

			<ul class="nav">
				<li>
					<a href="dashboard.html">
						<i class="pe-7s-graph"></i>
						<p> Início </p>
					</a>
				</li>
				<li>
					<a href="user.html">
						<i class="pe-7s-note2"></i>
						<p>Listagens</p>
					</a>
				</li>
				<li class="active">
					<a href="table.html">
						<i class="pe-7s-user"></i>
						<p>Gestão de utilizadores</p>
					</a>
				</li>
				<li>
					<a href="typography.html">
						<i class="pe-7s-news-paper"></i>
						<p>Posto de Venda</p>
					</a>
				</li>
				<li>
					<a href="icons.html">
						<i class="pe-7s-science"></i>
						<p>Configurações</p>
					</a>
				</li>

			</ul>
		</div>
	</div>

	<br> <br> <br>



	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<form method="GET" action= "{{ route('/getUser') }}" >
					@csrf




					<input style="text-align:center;" id="numProcesso" type="password" name="numProcesso" autofocus placeholder = "Introduza o numero de Processo">

				</form>
			</div>
		</div>
	</div>

	<div>


		@if (isset($_SESSION['pesquisa']))
		@if($_SESSION['pesquisa'] == 1)

		<form method="POST">
			@csrf


			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="header">
							<h4 class="title">Dados</h4>
						</div>
						<div class="content">
							<form>
								<div class="row">
									<div class="col-md-6" style="padding-bottom: 10px">
										<div class="form-group" >
											<label class="col-md-12" style="padding-left:0;">Escola</label>
											<input type="text" class="col-md-9 form-control" disabled placeholder="Escola" value="ETP Sicó">
											<input class="col-md-3 form-control" name="Editar" type="button" value="Editar">

										</div>
									</div>

									<div class="col-md-6" style="padding-bottom: 10px">
										<div class="form-group">
											<label class="col-md-12" style="padding-left:0;">Email</label>
											<input type="text" class="form-control col-md-9" disabled placeholder="Email" value='{{$user->email}}'>
											<input class="col-md-3 form-control" name="Editar" type="button" value="Editar">
										</div>

									</div>



									<div class="col-md-6" style="padding-bottom: 10">
										<div class="form-group">
											<label class="col-md-12" style="padding-left:0;">Isenção de Senha:</label>
											<select class="form-control col-md-9" disabled >
												<option >@if($user->numCartao == 1) Sim @else Não @endif</option>
												<option >@if($user->numCartao != 1) Sim @else Não @endif</option>
											</select>
											<input class="col-md-3 form-control" name="EditarSel" type="button" value="Editar">
										</div>
									</div>

									<div class="col-md-6" style="padding-bottom: 10px">
										<div class="form-group">
											<label class="col-md-12" style="padding-left:0;">Numero de Processo:</label>
											<input type="text" class="form-control col-md-9" disabled placeholder="NProcesso" value='{{$user->numProcesso}}'>
											<input class="col-md-3 form-control" name="Editar" type="button" value="Editar">
										</div>
									</div>

									<div class="col-md-6" style="padding-bottom: 10px">
										<div class="form-group">
											<label class="col-md-12" style="padding-left:0;">Numero de Cartão:</label>
											<input type="text" class="form-control col-md-9" disabled placeholder="Sem cartão associado!" value='{{$user->numCartao}}'>
											<input class="col-md-3 form-control" name="Editar" type="button" value="Editar">
										</div>
									</div>
									<div class="col-md-6" style="padding-bottom: 10px">
										<div class="form-group" action = {{'DataController@getUserType'}} >
											<label class="col-md-12" style="padding-left:0;">Tipo Utilizador:</label>
											<select class="form-control col-md-9" disabled >
												<option > <!--if(qualquercoisa) Professor else ...   --> </option>
												<option > Aluno </option>
												<option > Colaborador </option>

											</select>
											<input class="col-md-3 form-control" name="EditarSel" type="button" value="Editar">
										</div>
									</div>

								</div>

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
										<img class="avatar border-gray" src="{{$user->path_fotografia}}" alt="..."/>

										<h4 class="title">{{$user->name}}<br />
											<small>{{$user->numProcesso}}</small>
										</h4>
									</a>
								</div>

							</div>
							<hr>

						</div>
					</div>
				</div>




				@else
				<script> alert('Utilizador não encontrado'); </script>
				@endif
				@endif






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
<script type="text/javascript">
$('[name="Editar"]').on('click', function() {
	var prev = $(this).prev('input'),
	ro   = prev.prop('disabled');
	prev.prop('disabled', !ro).focus();
	$(this).val(ro ? 'Guardar' : 'Editar');
	var a = $(this).val();
	console.log(a);
	if ($(this).val()=='Editar') {
		$(this).prop("type", "submit");
	}
});

$('[name="EditarSel"]').on('click', function() {
	var prev1 = $(this).prev('select'),
	ro1   = prev1.prop('disabled');
	prev1.prop('disabled', !ro1).focus();
	$(this).val(ro1 ? 'Guardar' : 'Editar');
});
</script>
