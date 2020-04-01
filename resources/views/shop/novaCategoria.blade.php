
      @extends('layouts.app')

      @section('content')
      <html >
       <link rel="import" href="App\Http\Controllers\ProductController;">
       <section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url('{{ asset('assets/images/mainBackground.jpg')}}');">
        <!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->
        <body>
                <div class="container mbr-box" style="margin-top:100px;;display:block;">
              <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card" style="width:100%">
                    <a  href="{{route('shop/shop')}}" class="btn btn-primary " style="width:7.5%; margin-top:0;margin-bottom:2rem;font-size:3rem;float:left">
                      🡄
                    </a>
                    <div style="background-color: #ffffff;" class="container ">
                      <!--Titles-->
                      <div class="title pb-5 col-12">
                        <h2 class="align-left pb-3 mbr-fonts-style" style="font-size:7rem">
                          Criar nova Categoria
                        </h2>
                      </div>
                      <form action="{{route('criar.cat')}}" method="GET">
                      <a class="txt" style="width:80% ;font-size:2rem;font-weight:bold;margin:0 auto;display:block;text-align:center;">Nome da Categoria </a>
                      <input  style="text-align: center;background-color: #b8daff;font-size:2rem;font-weight:bold; border: solid #275dcf;" name="nomeCat" required></input>
                      <input class="btn btn-primary"  type="submit" value="Criar Categoria"style="padding-bottom: 50px ;width:80% ; color:white ;font-size:2rem;font-weight:bold;margin:0 auto;display:block;text-align:center;"></input>
                      </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </body>
            @endsection
            </html>
