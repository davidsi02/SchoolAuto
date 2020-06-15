<!doctype html>
 <?php session_start();
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
              <li class="active">
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
  <div class="row col-md-6" >
		<div class="col-md-12">
			<div class="card">
				<form method="GET" action= "{{ url('/getuserperms') }}" >
					@csrf




					<input style="text-align:center;" id="numProcesso" type="password" name="numProcesso" autofocus placeholder = "Introduza o numero de Processo">

				</form>
			</div>
		</div>
	</div>


   @if ($perms ?? '')


  <table class="table table-hover table-striped">
    <thead>
      <th>Nome</th>
      <th>Estado</th>

    </thead>
    <tbody>

      <tr>
        <td>Acesso Portaria</td>
        <td> <form  action= {{'PermissionController@getPermissions'}} method="get">
          <div class="checkbox">
            <input id= "aportaria" type="checkbox" name='dr[]' value="{{$perms->AcessoPortaria ?? ''}}">
                  <label for= "aportaria" ></label>

          </div> </td>
      </tr>

      <tr>
        <td>Acesso Cantina</td>
        <td> <form  action="{{route('cS')}}" method="get">
          <div class="checkbox">
            <input id= "acantina" type="checkbox" name='dr[]' value="1" checked>
                  <label for= "acantina" ></label>

          </div> </td>
      </tr>

      <tr>
        <td>Acesso Bar</td>
        <td> <form  action="{{route('cS')}}" method="get">
          <div class="checkbox">
            <input id= "abar" type="checkbox" name='dr[]' value="1" checked>
                  <label for= "abar" ></label>

          </div> </td>
      </tr>

      <tr>
        <td>Acesso Biblioteca</td>
        <td> <form  action="{{route('cS')}}" method="get">
          <div class="checkbox">
            <input id= "abiblioteca" type="checkbox" name='dr[]' value="1" checked>
                  <label for= "abiblioteca" ></label>

          </div> </td>
      </tr>

      <tr>
        <td>SAE</td>
        <td> <form  action="{{route('cS')}}" method="get">
          <div class="checkbox">
            <input id= "sae" type="checkbox" name='dr[]' value="1" checked>
                  <label for= "sae" ></label>

          </div> </td>
      </tr>

      <tr>
        <td>Administrador</td>
        <td> <form  action="{{route('cS')}}" method="get">
          <div class="checkbox">
            <input id= "admin" type="checkbox" name='dr[]' value="1" checked>
                  <label for= "admin" ></label>

          </div> </td>
      </tr>



      </tbody>
    </table>
    <input type="submit" id="btnSubmit" value="Aplicar">
  </form>
</div>

</div>

<div class="clearfix"></div>
</form>

</div>


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

</body>


<!--   Core JS Files   -->  <!--Foto da escola no Background do Menu -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

});
</script>
