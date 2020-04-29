@extends('layouts.app')

@section('content')
<html >
<link rel="import" href="App\Http\Controllers\ProductController;">
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-3" data-rv-view="0" style="background-image: url('{{ asset('assets/images/mainBackground.jpg')}}');">
  <!--<button class="btn btn-info" href="{{route('logout')}}" style="width:75px ;font-size:2.5rem;font-weight:bold;float: right;"type="button">X</button>-->  <!--Butão de LOGOUT, CASO PRECISO-->

  <body>
    <div class="table-primary " style="right:0;top:300;position: absolute; padding: 10;border-color: white;clear:both;width:30%">
      <h3 class="card  display-5 outline" style="font-size:2.5rem;text-align: center;border-style: none;font-weight:bold; background-color: white; font-size: auto; font-weight: bold; color: black; ">
        ID&nbsp;|&nbsp; Nome &nbsp;|&nbsp;Preço&nbsp;|&nbsp;Quantidade
      </h3>
      @foreach($senha as $senhas)
      <a href="#">{{$senha->dataRefeicao}}</a>
      @endforeach
      <a href="#">{{$data}}</a>

      </section>
    </body>
    @endsection
    </html>
