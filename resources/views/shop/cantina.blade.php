@extends('layouts.app')

@section('content')
<html >
<link rel="import" href="App\Http\Controllers\ProductController;">
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url('{{ asset('assets/images/mainBackground.jpg')}}');">
<!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->
<body>
  <form action="{{route('verifyCard')}}" method="get">
    <input id="myinputbox" class="inputValue" type="input" name="input" autofocus required/>
  </form>
  <script type="text/javascript">
  window.onload = function() {
    var input = document.getElementById("myinputbox").focus();
  }
  </script>
  <div class="container mbr-box" style="margin-top:100px;display:block;">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card" style="width:100%">
          <div style="background-color: #ffffff;overflow:auto" class="container ">
            <img style="height: 420px;transition: transform .4s;padding: 70px 0;margin-left:50px" dysplalign="left" src="http://www.etpsico.pt/media/alunos/94/filipe_ivanov.jpg" alt="..."/>
            <div class="container" style="position: absolute;margin:10%;background-color:white;padding:10;width:50%;display: inline-block;margin-left:20px">
              <?php       $senha=1; ?>
              <h4 class="title" style="vertical-align: middle;padding: 20px;text-overflow:hidden;background-color:#b8daff"><b>Nome:</b> Filipe Casimiro Stoianov Ivanov <br> <br>  <b>Num. Processo:</b> 12346178  <br> <br>
                @if($senha==true) <a class="btn btn-success" style="font-size:2rem;">Senha adquirida</a> @elseif($senha==false) <a class="btn-danger">Senha não adquirida</a> @endif
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</body>
@endsection
</html>
