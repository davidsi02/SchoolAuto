@extends('layouts.app')

@section('content')
<html >
<link rel="import" href="App\Http\Controllers\ProductController;">
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url('{{ asset('assets/images/mainBackground.jpg')}}');">
<!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->
<body>
  <form action="{{route('verifySenha')}}" method="get">
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
         @if($user ?? '')
        <div class="card" style="width:100%">
          <div style="background-color: #b8daff;overflow:auto;" class="container ">
            <img style="height: 420px;transition: transform .4s;padding: 70px 0;margin-left:50px" dysplalign="left"src="{{$user->path_fotografia}}" />
            <div class="container" style="position: absolute;margin:10%;background-color:white;padding:10;width:50%;display: inline-block;margin-left:20px">
              <h4 class="title" style="vertical-align: middle;padding: 20px;text-overflow:hidden;background-color:#ffffff"><b>Nome:</b>{{$user->name}}<br> <br>  <b>Num. Processo:</b>{{ $user->numProcesso  }}<br> <br>
                @if($senha==1) <a class="btn btn-success" style="font-size:2rem;">Senha adquirida!!</a> @elseif($senha==0) <a class="btn btn-danger" style="font-size:2rem;">Senha não adquirida</a> @elseif($senha==2)<a class="btn btn-danger" style="font-size:2rem;">Refeição já consumida!!</a>@endif
              </h4>
            </div>

          </div>
        </div>
        @endif

      </div>
    </div>
  </div>
</div>
</section>
</body>
@endsection
</html>
