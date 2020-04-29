@extends('layouts.app')

@section('content')


<html >
<link rel="import" href="App\Http\Controllers\ProductController;">
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url('{{ asset('assets/images/mainBackground.jpg')}}');">
  <!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->

  <body>

    <div class="table-primary " style="right:0;top:100;position: absolute; padding: 10 ;border-color: white;clear:both;float:right;width:30%;overflow:hidden">
      <div style="height:125px;">
        <img style="height:125;transition: transform .4s;" dysplalign="left" src="http://www.etpsico.pt/media/formandos/60/isabel_godinho.jpg" alt="..."/>
        <div class="container" style="position: absolute;float:right;background-color:white;padding:10;width:75%;height: 125;;display: inline-block">
          <h4 class="title" style=";text-overflow:"><b>Nome:</b> Isabel Godinho <br> <br>  <b>Num. Processo:</b> 9999999 <b><br>Função:</b> Slá
          </h4>
        </div>
      </div>
    </div>



    <div class="container" style="margin-top:75px;margin-top:50px;float:left;width:70%;padding:0; clear:both;">
      <div class="col-md-12" style="margin:0;padding:0">
        <div class="card" style="width:100%;padding:0">
          <div style="background-color: #ffffff;" class="container ">
            <!--Titles-->
            <div class="title pb-5 col-12">
              <h2 class="align-left pb-3 mbr-fonts-style" style="font-size:7rem">
                Escolha o posto de venda que pretende aceder
              </h2>
            </div>

            <div class="col-sm-4 col-md-4" style="display:inline-block;" >
              <div class="card-wrapper"  >
                <div class="card-box">
                  <h3 class="card outline" style="text-align: center;font-size:2rem ;border-style: none; background-color: white; color: black; ">
                    Portaria
                    <form class="" action="{{route('product.index')}}" method="get">
                      <button href="" type="submit" class="btn btn-primary" style=" font-size:2.5rem; font-weight: bold"> Portaria</button>
                    </form>
                    </h3>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 col-md-4" style="display:inline-block;" >
                <div class="card-wrapper"  >
                  <div class="card-box">
                    <h3 class="card outline" style="text-align: center;font-size:2rem ;border-style: none; background-color: white; color: black; ">
                      Bar
                      <form class="" action="{{route('product.index')}}" method="get">
                        <button href="" type="submit" class="btn btn-primary" style=" font-size:2.5rem; font-weight: bold"> Portaria</button>
                      </form>                      </h3>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4" style="display:inline-block;" >

                  <div class="card-wrapper"  >
                    <div class="card-box">
                      <h3 class="card outline" style="text-align: center;font-size:2rem ;border-style: none; background-color: white; color: black; ">
                        Biblioteca
                        <form class="" action="{{route('product.index')}}" method="get">
                          <button href="" type="submit" class="btn btn-primary" style=" font-size:2.5rem; font-weight: bold"> Portaria</button>
                        </form>                        </h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 col-md-4" style="display:inline-block;" >

                    <div class="card-wrapper"  >
                      <div class="card-box">
                        <h3 class="card outline" style="text-align: center;font-size:2rem ;border-style: none; background-color: white; color: black; ">
                          Secretaria
                          <form class="" action="{{route('product.index')}}" method="get">
                            <button href="" type="submit" value="" class="btn btn-primary" style=" font-size:2.5rem; font-weight: bold"> Portaria</button>
                          </form>                          </h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-4" style="display:inline-block;" >

                      <div class="card-wrapper"  >
                        <div class="card-box">
                          <h3 class="card outline" style="text-align: center;font-size:2rem ;border-style: none; background-color: white; color: black; ">
                            Refeitório
                            <form class="" action="{{route('product.index')}}" method="get">
                              <button href="" type="submit" class="btn btn-primary" style=" font-size:2.5rem; font-weight: bold"> Portaria</button>
                            </form>                            </h3>
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
