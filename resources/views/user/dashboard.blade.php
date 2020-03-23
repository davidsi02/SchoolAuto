
@extends('layouts.app')

@if(isset(Auth::user()->email))





<html lang="en">


<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	<title>SCHOOLAUTO - Área de Utilizador</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />





+

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
                <li class="active">
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
                    <a href="/transactions" action= {{'DataController@getUserPerms'}}>
                        <i class="pe-7s-note2"></i>
                        <p>Movimentos</p>
                    </a>
                </li>
										@if(Auth::user()->tipoUtilizador == 1)

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
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Saldos e Movimentos</h4>
                                <p class="category"></p>


                            </div>
                            <div class="content", action = {{('TransactionController@compactTransactions')}}>

															   <div>
																	 <table class="table table-hover table-striped", action = {{('TransactionController@compactTransactions')}}>
																 			<thead>

																 			</thead>
																 			<tbody>


																 				@foreach($operacao as $row)

																 					<tr>

																 					 <td>{{$row -> nomeOperacao}}</td>
																 						<td>{{$row -> valorOperacao}}</td>
																 						 <td>{{$row -> dataOperacao }}</td>

																 					 <td></td>
																 					</tr>


																					@endforeach


																 			</tbody>
																 	</table>
															 </div>

                                <div class="footer">
                                    <div class="legend">

                                    </div>

                                    <hr>
                                    <div class="footer">
                                        <i class="pe-7s-cash"></i>

																				<h> <font size = '4'> Saldo disponivel: {{ Auth::user()->saldo }}€ </font> </h>

																			                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Compra de Senhas</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content" action = {{'CalendarController@show'}}>
                                </div>
                                <div id="chartHours" class="ct-chart"></div>
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
<script>window.location = "/login";</script>
   @endif

</html>
