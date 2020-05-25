<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SCHOOLAUTO - Secretaria</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&subset=cyrillic,latin,greek,vietnamese">
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/animatecss/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/mobirise/css/style.css')}}">
	<link rel="stylesheet" href="{{(asset('assets/senhas/style.css'))}}">
	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="assets/css/animate.min.css" rel="stylesheet"/>

	<!--  Light Bootstrap Table core CSS    -->
	<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />


	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Criar Tarefa</h4>
				</div>
				<div class="modal-body">

						<br>
						<form method="POST" action= "{{ route('tarefaSubmit') }}" >
							@csrf


							<div class="col-md-12 w-100">

								<textarea class="col-md-12" style="border: 1px solid lightblue;border-radius:0" id='notcontent' name = "notcontent" type ="text" onKeyPress="return taLimit(this)" onKeyUp="return taCount(this,'myCounter')" rows="8" class="form-control"
								placeholder="Introduza aqui o texto a enviar com um limite de 60 caracteres!"> </textarea>

							</div>

						<B><SPAN id=myCounter>60</SPAN> / 60 caracteres disponiveis.

							<br>

							<div class="form-group row mb-0">
								<div class="col-md-4 offset-md-4">
									<div class="checkbox">
										<input id="pub" name="pub" type="checkbox" value="1" >
										<label for="pub"> Publica</label>
									</div>
									<div class="checkbox">
										<input id="priv" name="priv" type="checkbox"value="3">
										<label for="priv"> Privada</label>
									</div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							<button type="button" type="submit" class="btn btn-primary">Criar Tarefa</button>
							<input class="col-md-12	float-left" type="submit"   value="Enviar">
						</form>

						</div>
					</div>
				</div>
			</div>

			<!-- End Modal -->


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
						<li class="active">
							<a href="dashboard.html">
								<i class="pe-7s-graph"></i>
								<p> Início </p>
							</a>
						</li>
						<li>
							<a href="{{ url('/listagem') }}">
								<i class="pe-7s-note2"></i>
								<p>Listagens</p>
							</a>
						</li>
						<li>
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

			<div class="main-panel">
				<nav class="navbar navbar-default navbar-fixed">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Dashboard</a>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-left">
								<li>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-dashboard"></i>
										<p class="hidden-lg hidden-md">Dashboard</p>
									</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-globe"></i>
										<b class="caret hidden-lg hidden-md"></b>
										<p class="hidden-lg hidden-md">
											5 Notifications
											<b class="caret"></b>
										</p>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Notification 1</a></li>
										<li><a href="#">Notification 2</a></li>
										<li><a href="#">Notification 3</a></li>
										<li><a href="#">Notification 4</a></li>
										<li><a href="#">Another notification</a></li>
									</ul>
								</li>
								<li>
									<a href="">
										<i class="fa fa-search"></i>
										<p class="hidden-lg hidden-md">Search</p>
									</a>
								</li>
							</ul>

							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="">
										<p>Account</p>
									</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<p>
											Dropdown
											<b class="caret"></b>
										</p>

									</a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something</a></li>
										<li class="divider"></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</li>
								<li>
									<a href="#">
										<p>Log out</p>
									</a>
								</li>
								<li class="separator hidden-lg"></li>
							</ul>
						</div>
					</div>
				</nav>


				<div class="content">
					<div class="container-fluid">
						@if ($erroNada ?? '')
						<div class="row">
							<div class="col-md-12">
								<div class="card" style="background-color: #ffe0e0;">

									<div class="header inline-block">
										<h4 class="title" >ERRO<h4>
										<p class="category">Não foi possivel criar a tarefa!! Tente novamente!</p>

									</div>
								</div>
							</div>
						</div>
 					@endif
						<div class="row">
							<div class="col-md-4">
								<div class="card">

									<div class="header">
										<h4 class="title">Email Statistics</h4>
										<p class="category">Last Campaign Performance</p>
									</div>
									<div class="content">
										<div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

										<div class="footer">
											<div class="legend">
												<i class="fa fa-circle text-info"></i> Open
												<i class="fa fa-circle text-danger"></i> Bounce
												<i class="fa fa-circle text-warning"></i> Unsubscribe
											</div>
											<hr>
											<div class="stats">
												<i class="fa fa-clock-o"></i> Campaign sent 2 days ago
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-8">
								<div class="card">
									<div class="header">
										<h4 class="title">Portaria</h4>
										<p class="category">Ultimos 4 registos</p>
									</div>
									<div class="content">
										<div class="row grid-divider">

											@foreach($eS as $col)

											<div class="col-sm-3 col-md-6 col-lg-3 my-1">
												<div class="card">

													<img class="align-self-center" style="width: 100%;height:auto;max-width:200px;transition: transform .4s;" dysplalign="left" src="{{$col->path_fotografia}}" alt="..."/>
													<h4 class="row col-md-12 h5">{{$col->name}}  <br>{{$col->time}} <br>@if($col->valor==1) <i class="fa fa-circle text-success"></i> @elseif($col->valor==2)  <i class="fa fa-circle text-danger" style="margin: 0 auto"></i>  @endif
													</h4>
												</div>
											</div>


											@endforeach
										</div>

										<div class="footer">
											<div class="legend">
												<i class="fa fa-circle text-success"></i> Entrada
												<i class="fa fa-circle text-danger"></i> Saida
											</div>
											<hr>
											<div class="stats">
												<i class="fa fa-history"></i>
												{{ Carbon\Carbon::parse($eSfirst->time)->diffForHumans()}}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-md-6">
								<div class="card ">
									<div class="header inline-block">
										<h4 class="title ">Tarefas pessoais	<i class="fa fa-plus-square" style="float: right" data-toggle="modal" data-target="#myModal" title="Criar Tarefa"></i></h4>
									</div>
									<div class="content">
										<div class="table-full-width">
											<table class="table">
												<tbody>
													<tr>
														@foreach($TP as $row)

														<td>
															<div class="checkbox">
																<input id="checkbox1" type="checkbox">
																<label for="checkbox1"></label>
															</div>
														</td>
														<td><input type="text" class="form" readonly value='{{$row->conteudo}}'></td>
															<td class="td-actions text-right">
															<button type="button" rel="tooltip" name="Editar" title="Editar Tarefa" class="btn btn-info btn-simple btn-xs">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" rel="tooltip"  href="{{route('rT',$row->idTask)}}" title="Remover" class="btn btn-danger btn-simple btn-xs">
																<i class="fa fa-times"></i>
															</button>
														</td>
													</tr>
													@endforeach

												</tbody>
											</table>
										</div>
										<div class="footer">
											<hr>
											<div class="stats">
												<i class="fa fa-history"></i>
												{{ $TPU	}}
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="card ">
									<div class="header inline-block">
										<h4 class="title ">Tarefas Gerais	<i class="fa fa-plus-square" style="float: right" data-toggle="modal" data-target="#myModal" title="Criar Tarefa"></i></h4>

									</div>



									<div class="content">
										<div class="table-full-width">
											<table class="table">
												<tbody>
													<tr>

														@foreach($TG as $row)
														<td>
															<div class="checkbox">
																<input id="checkbox1" type="checkbox">
																<label for="checkbox1"></label>
															</div>
														</td>
														<form>
															<label hidden>First Name</label>

														<td><input type="text" class="form" readonly value='{{$row->conteudo}}'></td>
														<td class="td-actions text-right">
															<button rel="tooltip" type="text" name="Edit" type="button" value="" title="Editar Tarefa" class="btn btn-info btn-simple btn-xs">
																<i class="fa fa-edit"></i>
															</button>
														</form>

															<button type="button" rel="tooltip"  href="{{route('rT',$row->idTask)}}" title="Remover" class="btn btn-danger btn-simple btn-xs">
																<i class="fa fa-times"></i>
															</button>
														</td>
														@endforeach

													</tr>
												</tbody>
											</table>
										</div>
										<div class="footer">
											<hr>
											<div class="stats">
												<i class="fa fa-history"></i>
												{{     $TGU}}
												<form>
																<label>First Name</label>
																<input  placeholder="Lorem" readonly required  /><input >
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




















			<!--   Core JS Files   -->
			<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
			<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

			<!--  Charts Plugin -->
			<script src="assets/js/chartist.min.js"></script>

			<!--  Notifications Plugin    -->
			<script src="assets/js/bootstrap-notify.js"></script>

			<!--  Google Maps Plugin    -->
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>


			<script type="text/javascript">
			$(document).ready(function(){

				demo.initChartist();

				$.notify({
					icon: 'pe-7s-smile',
					message: "Bem-vindo(a) ao <b>SCHOOLAUTO</b> - Desejamos-lhe uma boa utilização :)."

				},{
					type: 'info',
					timer: 4000
				});

			});

			/**
			* DHTML textbox character counter script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
			*/

			maxL=60;
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


				$('[name="Editar"]').on('click', function() {
    		var prev = $(this).prev('input'),
        ro   = prev.prop('readonly');
    		prev.prop('readonly', !ro).focus();
    		$(this).val(ro ? 'Save' : 'Edit');
				});
				</script>


				</html>
