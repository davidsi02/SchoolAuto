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
            <a  href="{{route('product.index')}}" class="btn btn-primary " style="width:7.5%; margin-top:0;margin-bottom:2rem;font-size:3rem;float:left">
              🡄
            </a>
            <div style="background-color: #ffffff;" class="container ">
              <!--Titles-->
              <div class="title pb-5 col-12" style="width:80%;margin:0;margin:0;display:block;padding-bottom:0 !important">
                <h2 class="align-left pb-3 " style="font-size:6rem;width:80%padding-bottom: 0px !important;">
                  Mostrar/ Ocultar Produtos
                </h2>
              </div>

              <div class="tabpanel">

                <!-- Nav tabs -->
                <ul class="nav navbar" role="tablist">
                  <?php for ($num=1; $num <= 13 ; $num++) { ?>
                    <li role="presentation"  >
                      <a type="button" @if($num==$activepage ?? '') class="btn btn-info"  @else  class="btn btn-primary" @endif style="font-size:2.5rem;text-align: center;;width:7rem" href="{{route('tabsVisib',[$num])}}">{{ $num }}</a>
                    </li>
                  <?php  } ?>

                  <li role="presentation"  >
                    <a type="button" @if($activepage ==15) class="btn btn-info"  @else  class="btn btn-primary" @endif style="" href="{{route('tabsVisib',15)}}"> <img src="https://cdn1.iconfinder.com/data/icons/hawcons/32/698902-icon-21-eye-hidden-512.png" style="width:5rem"alt=""> </a>
                  </li>

                </ul>

                <!-- Tab panes-->
                <div class="tab-content">
                  @foreach($products->chunk(15) as $productChunk)
                  <div class="row " style="padding:10;">
                    @foreach($productChunk as $product)
                    @if($product->idCategoria == 1)

                    <div class="col-sm-4 col-md-4">
                      <div class="card-wrapper">
                        <div class="card-box">
                          <h3 class="card">
                              <div class="btn-group" >
                                <a class="spanProduto fnt2rem" style="font-size:3rem">{{ $product-> nomeProduto}}</a>

                                <button type="button" class="btn btn-primary largura90 dropdown-toggle "  style="    margin: 0 auto;font-size:2.5rem"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$product-> precoProduto}}€
                                </button>
                                <div class="dropdown-menu largura100" style="height: 500;text-align-last: center;
" >
                                  @if($product->visibilidade == 1)
                                  <a  href=" {{route('visibilidadeOcultar', $product->id)}}"  class="btn btn-success fnt2rem centrar largura90 centrarButao" >
                                    Ocultar
                                  </a>
                                  @else

                                    <form class="form-inline" action="{{route('visibilidadeMostrar',$product->id)}}" method="get">
                                      <a type="submit" class="btn btn-danger fnt2rem centrar centrarButao ">Mostrar</a>
                                    <input class="SquareInput centrarButao largura90 marginA tam" type="text" name="pag" name="fname"  maxlength="2" placeholder="Página em que o produto vai ser adicionado" required>
                                  </form>
                                  @endif

                                  @if($NOTpagina1 ?? ''== true)
                                  <div class="dropdown-divider"></div>
                                    <form class="form-inline" action="{{route('mudarPagina', [$product->id])}}" method="get">
                                    <button type="submit" class="btn btn-info largura90 marginA"> Mudar para a pagina:</button>
                                    <input class="SquareInput centrarButao largura90 marginA tam" type="text" name="pag"   maxlength="2" required>
                                  </form>
                                  @endif

                                  @if($NOTpagina1 ?? ''== true)
                                  <div class="dropdown-divider"></div>
                                    <form class="form-inline" action="{{route('mudarPosicao', [$product->id,$activepage])}}" method="get">
                                    <button type="submit" class="btn btn-info largura90 marginA"> Mudar posição do produto:</button>
                                    <input class="SquareInput centrarButao largura90 marginA tam" style="" type="text" name="posicao"   maxlength="2" required>
                                  </form>
                                  @endif
                                  </div>
                                </div>

                            </h3>
                          </div>
                        </div>
                      </div>
                      @endif
                      @endforeach
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
    @endsection
    </html>
