<!--
@extends('layouts.app')

@section('content')
<html >
<link rel="import" href="App\Http\Controllers\ProductController;">
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url('{{ asset('assets/images/mainBackground.jpg')}}');">
<!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->
<body>
  <div class="">

  </div>
  <div class="container mbr-box" style="margin-top:100px;display:block;">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card" style="width:100%">
          <a  href="{{route('product.index')}}" class="btn btn-primary " style="width:7.5%; margin-top:0;margin-bottom:2rem;font-size:3rem;float:left">
            🡄
          </a>
          <div style="background-color: #ffffff;" class="container ">
            <div class="row">
              <div class="col">
                    <div class="card card-body">

                        <a class="subtitulo"> Criar Produto </a>
                        <form action="{{route('criar.prod')}}" method="GET">
                        <a class="legendas ">Nome do Produto </a>
                        <input class="inputTexto" name="nomeProd" required></input>

                        <a class="legendas "> Preço do Produto <small>(Exemplo: <b>01.00</b>)</small></a>
                        <input  class="inputTexto" name="precoProd" required></input>

                      <a class="legendas "> Categoria </a>
                        <select class="inputTexto" name="nomeCat" required>
                          @foreach($categorias as $categorias)
                           <option style="text-align: center;" value="{{ $categorias->nomeCategoria}}">{{ $categorias->nomeCategoria}}</option>
                          @endforeach
                        </select>

                        <input class="btn btn-primary"  type="submit" value="Criar Produto"style="padding-bottom: 50px ;width:80% ; color:white ;font-size:2rem;font-weight:bold;margin:0 auto;display:block;text-align:center;"></input>
                    </div>
                  </div>
                </div>
              </div>
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
</html> -->
