<?php

session_start();
?>

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
		<div class="sidebar" data-color= "<?php echo Auth::user()->uiColor ?>" data-image="{{asset('assets/images/dsc-0066-source-1500x1000.jpg')}}">

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




				<li class="active">
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

		<div class="content" style="min-height:1px;padding: 0;padding-top:20">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<div class="card">

							<div class="header">
								<h4 class="title">Alterar Cor</h4>
								<p class="category"></p>
							</div>
							<div class="content">

								<div>
									<form method="POST" action= "{{ route('/colorchange') }}" >
										@csrf

										<table class="table table-hover table-striped">
											<thead>
												<th>Cor</th>
												<th></th>
											</thead>
											<tbody>

												<tr>
													<td>Vermelho</td>
													<td>		<button name = 'red' type="submit" class="btn btn-secondary">


														{{ __('Selecionar') }}
													</button> </td>
												</tr>

												<tr>
													<td>Laranja</td>
													<td>		<button name = 'orange' type="submit" class="btn btn-secondary">


														{{ __('Selecionar') }}
													</button> </td>
												</tr>

												<tr>
													<td>Azul Escuro</td>
													<td>		<button name = 'blue' type="submit" class="btn btn-secondary">


														{{ __('Selecionar') }}
													</button> </td>
												</tr>

												<tr>
													<td>Azul Claro</td>
													<td>		<button name = 'azure' type="submit" class="btn btn-secondary">


														{{ __('Selecionar') }}
													</button> </td>
												</tr>
												<tr>
													<td>Verde</td>
													<td>		<button name = 'green' type="submit" class="btn btn-secondary">


														{{ __('Selecionar') }}
													</button> </td>
												</tr>
												<tr>

													<td>Roxo</td>
													<td>		<button name = 'purple' type="submit" class="btn btn-secondary">


														{{ __('Selecionar') }}
													</button> </td>
												</tr>

												<td>Cinza</td>
												<td>		<button name = "none" type="submit" class="btn btn-secondary" action = <?php $_SESSION['submittype'] = 2; ?>>


													{{ __('Selecionar') }}
												</button> </td>
											</form>
										</tr>


									</tbody>
								</table>


							</div>
						</div>
					</div>
				</div>



				<div class="col-md-8">
					<div class="card">

						<div class="header">
							<h4 class="title">Enviar Sugestão / Reportar Erro</h4>
							<p class="category"></p>
						</div>
						<div class="typo-line">
							<br>
							<form method="POST" action= "{{ route('/notificationsubmit') }}" >
								@csrf


								<div class="col-md-12">

									<textarea id='notcontent' name = "notcontent" type ="text" onKeyPress="return taLimit(this)" onKeyUp="return taCount(this,'myCounter')" rows="8" class="form-control"
									placeholder="Introduza aqui o texto a enviar com um limite de 100 caracteres!"> </textarea>

								</div>
							</div>

							<B><SPAN id=myCounter>100</SPAN> / 100 caracteres disponiveis.

								<br>

								<div class="form-group row mb-0">
									<div class="col-md-4 offset-md-4">
										<div class="checkbox">
											<input id="suggestion" name="suggestion" type="checkbox" value="1" >
											<label for="suggestion"> Sugestão</label>
										</div>
										<div class="checkbox">
											<input id="error" name="error" type="checkbox"value="3">
											<label for="error"> Erro</label>
										</div>
											<input class="col-md-12	float-left" type="submit"   value="Enviar">
											<input id="enviar" hidden style="margin-bottom:10"name = 'enviar' type="submit" class="btn btn-primary">
										</form>





									</div>
								</div>


							</div>
						</div>



					</div>
				</div>
			</div>
		</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-right">

							<p class="copyright pull-right">
								&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.etpsico.pt">SCHOOLAUTO</a> por David Simões, Alexandre Lopes e Bruno Freitas.
							</p>
						</nav>

						<div class="col-md-8 float-right">
							<img  src= "http://www.etpsico.pt/public/img/logos_entity.png" alt="">
						</div>

					</div>
				</footer>

			</body>


			<!--   Core JS Files   -->  <!--Foto da escola no Background do Menu -->
			<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
			<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

			<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
			<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>


			<script language = "Javascript">
			/**
			* DHTML textbox character counter script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
			*/

			maxL=100;
			var bName = navigator.appName;
			function taLimit(taObj) {
				if (taObj.value.length==maxL) return false;
				return true;
			}

			$('input[type="checkbox"]').on('change', function() {
				$('input[type="checkbox"]').not(this).prop('checked', false);
			});

			$(document).ready(function () {
				$('#enviar').click(function() {
					checked = $("input[type=checkbox]:checked").length;

					if(!checked) {
						alert("Escolhe uma das opções de envio.");
						return false;
					}

				});
			});

			function taCount(taObj,Cnt) {
				objCnt=createObject(Cnt);
				objVal=taObj.value;
				if (objVal.length>maxL) objVal=objVal.substring(0,maxL);
				if (objCnt) {
					if(bName == "Netscape"){
						objCnt.textContent=maxL-objVal.length;}
						else{objCnt.innerText=maxL-objVal.length;}
					}
					return true;
				}
				function createObject(objId) {
					if (document.getElementById) return document.getElementById(objId);
					else if (document.layers) return eval("document." + objId);
					else if (document.all) return eval("document.all." + objId);
					else return eval("document." + objId);
				}
			</script>
