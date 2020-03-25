@extends('layouts.app')

@section('content')
<html >
<link rel="import" href="App\Http\Controllers\ProductController;">
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url('{{ asset('assets/images/mainBackground.jpg')}}');">
  <!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->
  <body>

    <div class="container mbr-box" style="margin-top:50px;margin-bottom:50px;display:block;">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card" style="width:100%">
            <a  href="{{route('ShopHome')}}" class="btn btn-primary " style="width:7.5%; margin-top:0;margin-bottom:2rem;font-size:3rem;float:left">
              🡄
            </a>
            <div style="background-color: #ffffff;" class="container ">
              <!--Titles-->
              <div class="title pb-5 col-12" style="width:80%;margin:0;margin:0;display:block;padding-bottom:0 !important">
                <h2 class="align-left pb-3 mbr-fonts-style" style="font-size:6rem;width:80%padding-bottom: 0px !important;">
                  Mostrar/ Ocultar Produtos
                </h2>
              </div>

              <div style="font-size:4rem;font-weight: bold">
                {{$products->render()}}
              </div>
              @foreach($products->chunk(15) as $productChunk)
              <div class="row " style="padding:10;">
                @foreach($productChunk as $product)
                <div class="col-sm-4 col-md-4">
                  <div class="card-wrapper">
                    <div class="card-box">
                      <h3 class="card outline" style="text-align: center;font-size:2.5rem ;border-style: none; background-color: white; color: black; ">
                        {{ $product-> nomeProduto}}
                        <a  class="btn btn-primary  " style=" font-size:3rem;color: white;font-weight: bold">{{$product-> precoProduto}}€ <a>
                          @if($product->visibilidade == 1)
                          <a  href=" {{route('visibilidadeOcultar', $product->id)}}"  class="btn btn-success" style="width:100%; margin-top:0;margin-bottom:1rem" >
                            Ocultar
                          </a>
                          @else
                          <a  href="{{route('visibilidadeMostrar',$product->id)}}" class="btn btn-danger " style="width:100%; margin-top:0;margin-bottom:1rem">
                            Mostrar
                        </a>
                        @endif
                      </h3>
                    </div>
                  </div>
                </div>

                @endforeach
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
  @endsection
  </html>
