@extends('layouts.app')

@section('content')


<html >
<link rel="import" href="App\Http\Controllers\ProductController;">
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url('{{ asset('assets/images/mainBackground.jpg')}}');">
  <!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" style="font-weight:bold"href="#">Painel de Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('novoProduto')}}">Add Produto <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('indexNovaCategoria')}}">Add Categoria <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('visibilidade')}}">Visibilidade de Produtos <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('indexGerirPreco')}}">Alterar Preços <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('indexEliminarProduto')}}">Eliminar Produto <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
          <a class="nav-link" href="{{route('indexEliminarCategoria')}}">Eliminar Categoria <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <body>
    <form class="" action="verifyCard" method="get">
      <input id="myinputbox" class="inputValue" type="input" name="input" autofocus/>
    </form>
<script type="text/javascript">
window.onload = function() {
var input = document.getElementById("myinputbox").focus();
}
</script>
    <div class="table-primary " style="right:0;top:100;position: absolute; padding: 10 ;border-color: white;clear:both;float:right;width:30%;overflow:hidden">
      <div style="height:125px;">
        <img style="height:125;transition: transform .4s;" dysplalign="left" src="{{$user->path_fotografia ?? ''}}" alt="..."/>
        <div class="container" style="position: absolute;float:right;background-color:white;padding:10;width:75%;height: 125;;display: inline-block">
          <h4 class="title" style=";text-overflow:"><b>Nome:</b> {{$user->name ?? ''}} <br> <br>  <b>Num. Processo:</b> {{$user->numProcesso ?? ''}} <b><br>Saldo:</b> {{$user->saldo ?? ''}}
          </h4>
        </div>
      </div>
    </div>




    <div class="table-primary " style="right:0;top:300;position: absolute; padding: 10;border-color: white;clear:both;float:right;width:30%">
      <h3 class="card  display-5 outline" style="font-size:2.5rem;text-align: center;border-style: none;font-weight:bold; background-color: white; font-size: auto; font-weight: bold; color: black; ">
        ID&nbsp;|&nbsp; Nome &nbsp;|&nbsp;Preço&nbsp;|&nbsp;Quantidade
      </h3>
      @foreach(Cart::content() as $row)
      <div class="row" style="padding:0px;">
        <div class="col-sm-12 col-md-12">
          <div class="card-wrapper">
            <div class="card-box">
              <h3 class="card  display-5 outline" style="font-size:2.5rem;text-align: center;border-style: none; background-color: white; font-size: 1.5rem; font-weight: bold; color: black;display:block; ">
                {{ $row-> id}}&nbsp;| &nbsp;  {{ $row-> name}} &nbsp;|&nbsp; {{ $row->price}}€&nbsp;|&nbsp; {{ $row-> qty}} <a href="{{route('prod.eliminar',$row-> id)}}"  class="btn btn-primary  " style=" font-size: .5rem;font-weight: bold;width:7%;float: right;">X<a>
                </h3>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <a class="btn btn-primary just" href="{{route('cart.eliminar')}}" style="width:100% ;font-size:1.5rem;font-weight:bold;margin:0 auto;display:block;"> Eliminar Tudo </a>
        <input readonly style="text-align: center;font-size:1.5rem;font-weight:bold" value="Preço Total: {{cart::total()}} €"></input>
        <a class="btn btn-primary just" href="{{route('pagar')}}" style="width:100% ;font-size:1.5rem;font-weight:bold;margin:0 auto;display:block;"> Pagar </a>
      </div>



      <div class="container float-left" style="margin-top:50px;width:70%;padding:0; clear:both;">
        <div class="col-md-12" style="margin:0;padding:0">
          <div class="card" style="width:100%;padding:0">
            <div style="background-color: #ffffff;" class="container">
              <div class="title pb-5 col-10">
                <h2 class="align-left pb-3 mbr-fonts-style" style="font-size:7rem">
                  Posto de Venda
                </h2>
              </div>
              <div style="font-size:4rem;font-weight: bold">
                @if(isset($idC))
                 {{ $products->appends(['input' => $idC])->links() }}
                @else
                {{ $products->render() }}
                @endif

              </div>
              <a href="/shop"  class="button float-right" style=" font-size:2.5rem; font-weight: bold" ><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/120/joypixels/239/counterclockwise-arrows-button_1f504.png" type="button" class="img2" href="/shop"><a>

              @foreach($products->chunk(15) as $productChunk)
              <div class="row " style="padding:10;">
                @foreach($productChunk as $product)
                @if($product->idCategoria == 1)
                @if($product->visibilidade == 1)

                <div class="col-sm-4 col-md-4">
                  <div class="card-wrapper">
                    <div class="card-box">
                      <h3 class="card outline" style="text-align: center;font-size:2rem ;border-style: none; background-color: white; color: black; ">
                        {{ $product-> nomeProduto}}
                        <a href="{{route('product.addToCart',[$product->id,$product->nomeProduto ,$product->precoProduto ])}}"  class="btn btn-primary" style=" font-size:2.5rem; font-weight: bold">{{$product-> precoProduto}}€ <a>
                        </h3>
                      </div>
                    </div>
                  </div>
                  @endif
                  @endif
                  @endforeach
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </section>
      </body>
      @endsection
      </html>