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

	<!-- Modal Criar-->
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

								<textarea class="col-md-12" style="border: 1px solid lightblue;border-radius:0" id='notcontent' required name = "notcontent" type ="text" onKeyPress="return taLimit(this)" onKeyUp="return taCount(this,'myCounter')" rows="8" class="form-control"
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
							<button  type="submit" value="Enviar" class="btn btn-primary">Criar Tarefa</button>
						</form>

						</div>
					</div>
				</div>
			</div>

			<!-- End Modal -->

				<!-- Modal TPA-->
				<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Tarefas pessoais Acabadas</h4>
							</div>
							<div class="modal-body">
								<div class="content">
									<div class="table-full-width">
										<table class="table">
											<tbody>
													@foreach($TPA as $row)
													<tr id="a">

													<td>
														<form class="" action="{{route('rT',$row->idTask)}}" method="post">

														<div class="checkbox">
															<input id="a" checked disabled type="checkbox">
															<label for="a"></label>
														</div>
													</form>

													</td>

													<td><input type="text" class="form" readonly value='{{$row->conteudo}}'></td>
													<td class="td-actions text-right">


														<a type="submit" id="{{$row->idTask}}" rel="tooltip"  onclick="b(this.id);" title="Remover" class="btn btn-danger btn-simple btn-xs">
															<i class="fa fa-times"></i>
														</a>
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
											{{ $TPAU	}}
										</div>
									</div>
								</div>
									</div>

								</div>
							</div>
						</div>

						<!-- End Modal TPA-->
						<!-- Modal TGA-->
						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Tarefas gerais Acabadas</h4>
									</div>
									<div class="modal-body">
										<div class="content">
											<div class="table-full-width">
												<table class="table">
													<tbody>
															@foreach($TGA as $row)
															<tr id="a">

															<td>
																<form class="" action="{{route('rT',$row->idTask)}}" method="post">

																<div class="checkbox">
																	<input id="{{$row->idTask}}"  type="checkbox" type="submit" onclick="a(this);">
																	<label for="{{$row->idTask}}"></label>
																</div>
															</form>

															</td>

															<td><input type="text" class="form" readonly value='{{$row->conteudo}}'></td>
															<td class="td-actions text-right">


																<a type="submit" id="{{$row->idTask}}" rel="tooltip"  onclick="b(this.id);" title="Remover" class="btn btn-danger btn-simple btn-xs">
																	<i class="fa fa-times"></i>
																</a>
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
													{{ $TGAU	}}
												</div>
											</div>
										</div>
											</div>

										</div>
									</div>
								</div>

								<!-- End Modal TGA-->

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
							<a href="{{ url('/secretaria') }}">
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
							<a href="{{ url('/gestaousers') }}">
								<i class="pe-7s-user"></i>
								<p>Gestão de utilizadores</p>
							</a>
						</li>
						<li>
							<a href="{{url('/shop')}}" >
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
						<div class="row">
							<div class="col-md-4">
								<div class="card">

									<div class="header">
										<h4 class="title">Piadas Semanais </h4>
										<p class="category">ABCDEFGHIJKLMNOPQRSTUWXYZ</p>
									</div>
									<div class="content">

										A professora está a falar sobre o abecedário e pergunta ao Joãozinho: - Joãozinho. Qual é a última letra do abecedário?		Ele responde rapidamente: - Claro que é a letra “O”, professora!		 A professora pergunta, surpresa: - Achas mesmo?! 		Não seria a letra “Z”? 		Joãozinho responde: - Não, professora! Se fosse assim, pronunciava-se “abecedarioz”.
										<div class="footer">
											<div class="legend">
												<i class="fa fa-circle text-info"></i> L
												<i class="fa fa-circle text-danger"></i> O
												<i class="fa fa-circle text-warning"></i> L
											</div>
											<hr>
											<div class="stats">
												<i class="fa fa-clock-o"></i> 17 YEARS AGO
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
												{{ $eSfirst}}
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
										<h4 class="title ">Tarefas pessoais	<i class="fa fa-plus-square" style="float: right" data-toggle="modal" data-target="#myModal" title="Criar Tarefa"></i><i class="fa fa-check-square" style="float: right;margin-right:5px;" data-toggle="modal" data-target="#myModal1" title="Criar Tarefa"></i></h4>
									</div>
									<div class="content">
										<div class="table-full-width">
											<table class="table">
												<tbody>
														@foreach($TP as $row)
														<tr id="a">

														<td>
															<form class="" action="{{route('rT',$row->idTask)}}" method="post">

															<div class="checkbox">
																<input id="{{$row->idTask}}"  type="checkbox" type="submit" onclick="a(this);">
																<label for="{{$row->idTask}}"></label>
															</div>
														</form>

														</td>

														<td><input type="text" class="form" readonly value='{{$row->conteudo}}'></td>
														<td class="td-actions text-right">
															<button rel="tooltip" type="text" name="Edit" type="button" value="" title="Editar Tarefa" class="btn btn-info btn-simple btn-xs">
																<i class="fa fa-edit"></i>
															</button>

															<a type="submit" id="{{$row->idTask}}" rel="tooltip"  onclick="b(this.id);" title="Remover" class="btn btn-danger btn-simple btn-xs">
																<i class="fa fa-times"></i>
															</a>
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
										<h4 class="title ">Tarefas Gerais	<i class="fa fa-plus-square" style="float: right" data-toggle="modal" data-target="#myModal" title="Criar Tarefa"></i><i class="fa fa-check-square" style="float: right;margin-right:5px;" data-toggle="modal" data-target="#myModal2" title="Criar Tarefa"></i></h4>

									</div>



									<div class="content">
										<div class="table-full-width">
											<table class="table">
												<tbody>
													<tr>

														@foreach($TG as $row)
														<tr id="{{$row->idTask}}">

														<td>
															<div class="checkbox">
																<input id="{{$row->idTask}}" type="checkbox" href="{{route('rT',$row->idTask)}}" onclick="a(this);" >
																<label for="{{$row->idTask}}"></label>
															</div>
														</td>

														<td><input type="text" class="form" readonly value='{{$row->conteudo}}'</td>
														<td class="td-actions text-right">
															<button id="{{$row->idTask}}" rel="tooltip" type="text" name="Edit" type="button" onclick="c(this.id);" title="Editar Tarefa" class="btn btn-info btn-simple btn-xs">
																<i class="fa fa-edit"></i>
															</button>

															<a type="submit" id="{{$row->idTask}}" rel="tooltip"  onclick="b(this.id);" title="Remover" class="btn btn-danger btn-simple btn-xs">

																<i class="fa fa-times"></i>
															</a>
														</td>
													</tr>

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


</body>


<!--   Core JS Files   -->  <!--Foto da escola no Background do Menu -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

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
    		var prev = $(this).nearest('input'),
        ro   = prev.prop('readonly');
    		prev.prop('readonly', !ro).focus();
				});
				function a(id)
				        {
									var b = id.closest('tr');
									console.log(b.id);
									$(this).closest('td').find('.contact_name').text();
										$(b).fadeToggle();
										var id = $(id).attr('id');

									         $.ajax({
									                 url:'/remTask',
									                 type:'post',
									                 cache:true,
									                 data: {
									                   id: id,
																		 _token: '{{csrf_token()}}'
									                 },
									                 success:  function (response) {
																		 console.log(id);
									                     console.log("ok");
																			 location.reload();

									                 },
									         });
								}
								function b(id)
								        {
													var id = id;
													console.log(id);
													         $.ajax({
													                 url:'/atlTask',
													                 type:'post',
													                 cache:true,
													                 data: {
													                   id:id,
																						 _token: '{{csrf_token()}}'
													                 },
													                 success:  function (response) {
																						 console.log(id);
													                     console.log("ok");
																							 location.reload();
																							 location.reload();

													                 },
													         });
												}

												function c(id)
																{
																	var id = id;
																	console.log(id);
																	$('[id="id"]')
																}

																$('[id="EditarF"]').on('click', function() {
																	if ($(this).val()=='Guardar') {
																		$(this).prop("type", "submit");

																	}else {
																		var prev = $('[id="path"]');
																		ro   = prev.prop('disabled');
																		prev.prop('disabled', !ro);
																		var label = $('[id="pathL"]');

																		$(this).val(ro ? 'Guardar' : 'Editar');
																		var a = $(this).val();
																		label.text('Escolher ficheiro.');
																		label.css("background-color", "white").focus();


																	}
																});
				</script>


				</html>
