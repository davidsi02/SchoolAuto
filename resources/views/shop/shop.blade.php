@extends('layouts.app')

@section('content')

<script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
<html >

<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url(assets/images/dsc-0066-source-1500x1000.jpg);">
  <!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->
  <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" style="font-weight:bold"href="{{route('product.index')}}">Painel de Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('indexCriação')}}">Criar Produto<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('visibilidade')}}">Ordenação e Visibilidade <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('indexGerirPreco')}}">Alterar Preços <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('indexEliminar')}}">Eliminar Produto<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <body>
    <form action="{{route('verifyCard')}}" method="get">
      <input id="myinputbox" class="inputValue" type="input" name="input" autofocus required/>
    </form>
    <script type="text/javascript">
    window.onload = function() {
      var input = document.getElementById("myinputbox").focus();
    }
    </script>


    <?php $user= Session::get('user'); ?>
    <div class="table col-md-4 col-sm-12" style="background-color: white;right:0;top:300;position: absolute; padding: 10;border-color: white;clear:both;%">

    @if(isset($user))
        <div class="row align-items-center" style="padding-bottom: 10;">
        <img class="col-md-4" style="max-width: 30%;height:auto;transition: transform .4s;" dysplalign="left" src="{{$user->path_fotografia ?? ''}}" alt="..."/>
          <h4 class="title col-md-6" style="height:100%;background-color: white;font-size:1.3vw;text-overflow:hidden"><b>Nome:</b> {{$user->name ?? ''}} <br>   <b><br>Num. Processo:</b> {{$user->numProcesso ?? ''}} <b><br>Saldo:</b> {{$user->saldo ?? ''}}€
          </h4>
        </div>
    @endif
      <h3 class="card  display-5 outline" style="font-size:2.5rem;text-align: center;border-style: none;font-weight:bold; background-color:#6cb2eb; font-size: auto; font-weight: bold; color: black; ">
        ID&nbsp;|&nbsp; Nome &nbsp;|&nbsp;Preço&nbsp;|&nbsp;Quantidade
      </h3>
      @foreach(\Cart::content() as $row)
      <div class="row" style="padding:0px;">
        <div class="col-sm-12 col-md-12">
          <div class="card-wrapper">
            <div class="card-box">
              <h3 class="card  display-5 outline" style="font-size:2.5rem;text-align: center;border-style: none; color:white; background-color: #c6e0f5; font-size: 1.5rem; font-weight: bold; color: black;display:block; ">
                {{ $row-> id}}&nbsp;| &nbsp;  {{ $row-> name}} &nbsp;|&nbsp; {{ $row->price}}€&nbsp;|&nbsp; {{ $row-> qty}} <a href="{{route('prod.eliminar',$row-> id)}}"  class="btn btn-danger  " style=" font-size: .5rem;font-weight: bold;width:7%;float: right;">X<a>
                </h3>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="row col-md-12 align-items-center" style="display:block;">
          <a class="btn btn-danger col-md-4" href="{{route('cart.eliminar')}}" style="font-size:1vw;"> Eliminar Tudo </a>
          <input class="col-md-4" readonly style="text-align: center;font-size:1vw" value="Preço Total: {{\Cart::total()}} €"></input>
          <a class="btn btn-primary col-md-4" href="{{route('pagar')}}" style="font-size:1vw;width:90%"> Pagar </a>
      </div>

      </div>



      <div class="container col-md-8" style="margin-top:75px;margin-top:50px;float:left;padding:0; clear:both;">
        <div class="col-md-12" style="margin:0;padding:0">
          <div class="card">
            <div style="background-color: #f6f6f6;" class="container col-12">
              <div class="title col-10">
                <h2 class="align-left pb-3 mbr-fonts-style" style="font-size:7rem">
                  {{\DB::table('categoriaproduto')->where('idCategoria',$_SESSION['categoriaShop'])->value('nomeCategoria')}}
                </h2>
              </div>
              <div style="font-size:4rem;font-weight: bold;">

                <div class="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="col-md-12 nav navbar" role="tablist">
                    <?php
                    for ($num=1; $num <= 12 ; $num++) { ?>
                      <li role="presentation" >
                        <a type="button" @if($num==$activepage ?? '') class="btn btn-info"  @else  class="btn btn-primary" @endif class="col-md-1" style="font-size:4.2vh;width:4.5vw;" href="{{route('tabs',[$num])}}">{{ $num }}</a>
                      </li>
                    <?php  }?>
                  </ul>

                  <!-- Tab panes-->
                  <div class="tab-content">
                    @foreach($products->chunk(20) as $productChunk)
                    <div class="row " style="padding:10;">
                      @foreach($productChunk as $product)
                      @if($product->idCategoria == $_SESSION['categoriaShop'])
                      @if($product->visibilidade == 1)

                      <div class="col-sm-3 col-md-3">
                        <div class="card-wrapper">
                          <div class="card-box">
                            <h3 class="card outline" style="text-align: center;font-size:1.5vw ;border-style: none; background-color: white; color: black; ">
                              <a href="{{route('product.addToCart',[$product->id,$product->nomeProduto ,$product->precoProduto ])}}"  class="btn btn-primary" style="overflow:hidden;background-size: 100%; @if( $product-> imagem??'') -webkit-text-stroke: 2.5px #3b444b;color: white;background-image:url('{{ $product-> imagem}}');;@endif font-size:2vw; font-weight: bold"> .<a>
                                <span class="float-left"><b>{{ $product-> nomeProduto}}</b></span>
                                <span class="float-right">  {{ $product-> precoProduto}}€</span>
                              </h3>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endif
                        @endforeach
                      </div>

                        @endforeach
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
    <script>

</script>
@endsection
</html>
