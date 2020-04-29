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
            <p>
              <a class="btn btn-primary fnt2rem" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Criar Categoria</a>
              <button class="btn btn-primary fnt2rem float-right" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Criar Produto</button>
            </p>
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                  <div class="card card-body">
                      <a class="txt legendas subtitulo"> Criar Categoria </a>
                      <form action="{{route('criar.cat')}}" method="GET">
                        <a class="txt legendas" style="width:80% ;font-size:2rem;margin:0 auto;display:block;text-align:center;">Nome da Categoria </a>
                        <input  style="text-align: center;background-color: #b8daff;font-size:2rem;font-weight:bold; border: solid #275dcf;" name="nomeCat" required></input>
                        <input class="btn btn-primary"  type="submit" value="Criar Categoria"style="padding-bottom: 50px ;width:80% ; color:white ;font-size:2rem;font-weight:bold;margin:0 auto;display:block;text-align:center;"></input>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">

                        <a class="txt legendas subtitulo"> Criar Produto </a>
                        <form action="{{route('criar.prod')}}" method="GET">
                        <a class="txt legendas">Nome do Produto </a>
                        <input class="inputTexto" name="nomeProd" required></input>

                        <a class="txt legendas"> Preço do Produto <small>(Exemplo: <b>01.00</b>)</small></a>
                        <input  class="inputTexto" name="precoProd" required></input>

                      <a class="txt legendas"> Categoria </a>
                        <select class="inputTexto2" name="nomeCat" required>
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
