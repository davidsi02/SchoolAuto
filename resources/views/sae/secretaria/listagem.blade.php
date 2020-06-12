<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SCHOOLAUTO - Secretaria</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel = "stylesheet" href = "/ _ recursos / css / chartist.css" />

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


	   <!--   Core JS Files   -->
     <script src = "// cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"> </script>

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
                    <a href="{{ url('/listagem') }}">
                        <i class="pe-7s-graph"></i>
                        <p> Início </p>
                    </a>
                </li>
                <li class="active">
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Carregamentos Diários</h4>
                                <p class="category">Sondagens</p>
                            </div>
                            <div class="content">

                              <div class = "ct-chart ct-perfect-4th"> </div>

                                <form href="{{ url('ListagensController@CarregamentosDiariosPorDatas') }}" method="post">
																De:
																<input type="text" name="DataInicio" class="form-control" autocomplete="off" id="DataInicio" placeholder="Introduza a Data Inicial">
																<br>
																<br>
																A:
																<input type="text" name="DataFim" class="form-control" autocomplete="off" id="DataFim" placeholder="Introduza a Data Final">

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Dia Anterior
                                        <i class="fa fa-circle text-alert"></i> Hoje
                                    </div>
                                    <hr>
																		<div style="padding:10px;">
																	 <a href="{{ url('carregamentos/pdf') }}" class="btn btn-danger" name="BotaoCarregamentosDiarios" id="BotaoCarregamentosDiarios" target="_blank" style="width:100%" >Carregamentos Diários</a>
																	 </div>
																	 <div style="padding:10px;">
																	<a href="{{ url('carregamentos/pdf') }}" class="btn btn-danger" name="BotaoCarregamentosPorData" id="BotaoCarregamentosPorData" target="_blank" style="width:100%" >Carregamentos por Datas</a>
																	</div>
                                </div>
																</form>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Refeições Consumidas e não Consumidas</h4>
                                <p class="category">Sondagens</p>
                            </div>
                            <div class="content">

															<form href="{{ url('ListagensController@RefeicoesPorDatas') }}" method="post">
															De:
															<input type="text" name="DataInicioRefeicoes" class="form-control" autocomplete="off" id="DataInicioRefeicoes" placeholder="Introduza a Data Inicial">
															<br>
															<br>
															A:
															<input type="text" name="DataFimRefeicoes" class="form-control" autocomplete="off" id="DataFimRefeicoes" placeholder="Introduza a Data Final">


                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Refeições Consumidas
                                        <i class="fa fa-circle text-warning"></i> Refeições não Consumidas
                                    </div>
                                    <hr>
																		<div style="padding:10px;">
																	 <a href="{{ url('refeicoesconsumidas/pdf') }}" class="btn btn-danger" target="_blank" style="width:100%" >Refeições Consumidas</a>
																	 </div>

																	 <div style="padding:10px;">
																	<a href="{{ url('refeicoesnconsumidas/pdf') }}" class="btn btn-danger" target="_blank" style="width:100%" >Refeições não Consumidas</a>
																	</div>
                                </div>
															</form>
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

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>


<script type="text/javascript">
	$(document).ready(function(){

			demo.initChartist();

			$.notify({
					icon: 'pe-7s-gift',
					message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

				},{
						type: 'info',
						timer: 4000
				});

	});
</script>

</html>
