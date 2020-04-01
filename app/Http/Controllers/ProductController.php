<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ProductController extends Controller
{

  public function getIndex(){


    $products = Product::where('visibilidade', 1)->where('idCategoria', 1)->paginate(15);
    return view('shop/shop', ['products' => $products]);

  }
  public function verifyCard(){
    if ($_GET['input']) {
    if (\DB::table('users')->where('numCartao', $_GET['input'])->first()) {
      $products = Product::where('visibilidade', 1)->where('idCategoria', 1)->paginate(15);
      $user = User::where('numCartao', $_GET['input'])->first();
      return view('shop/shop', ['products' => $products,'user' => $user, 'idC' => $_GET['input']]);
    }else {
      ?><script>

    alert("Não existe nenhum cartão acossiado a este número!!");

      </script><?php
      $products = Product::where('visibilidade', 1)->where('idCategoria', 1)->paginate(15);
      return view('shop/shop', ['products' => $products]);
      }
  }else{
    echo 'Ah';
      }
}


  public function getAddToCart($id, $nome,$preco) {

    \Cart::add($id,$nome,1,$preco);
    return redirect()->back()->withInput();
  }

  public function destroy() {

    \Cart::destroy();
    return redirect()->back()->withInput();

  }


  public function getIndexVisibilidade()
  {
    $products = Product::paginate(15);
    return view('shop/ShowOrHidde', ['products' => $products]);
  }

  public function ProdOcultar($id)
  {
    \DB::table('products')->where('id',$id)->update(['visibilidade' => 0]);
    return redirect()->back()->withInput();
  }

  public function ProdMostrar($id)
  {
    \DB::table('products')->where('id',$id)->update(['visibilidade' => 1]);
    return redirect()->back()->withInput();
  }

  public function indexNovoProd()
  {
    $categorias= \DB::table('categoriaproduto')->get();
    return view('shop/novoProduto', ['categorias' => $categorias]);
  }

  public function criarProduto() {

    if(\DB::table('products')->where('nomeProduto', $_GET['nomeProd'])->first()){

      return redirect()->back();
    }else{
      $cat = \DB::table('categoriaproduto')->where('nomeCategoria', $_GET['nomeCat'])->first();
      \DB::table('products')->insert(
        ['nomeProduto' => $_GET['nomeProd'],
        'precoProduto' => $_GET['precoProd'],
        'idCategoria' => $cat->idCategoria,
        'visibilidade' => 1,

      ]);

      return redirect()->back();
    }
  }




  public function indexGerirPreco()
  {
    $produtos= \DB::table('products')->get();
    return view('shop/gerirPreco', ['produtos' => $produtos]);
  }

  public function gerirPreco() {
    \DB::table('products')->where('nomeProduto', $_GET['nomeProd'])->update(['precoProduto' => $_GET['precoProd']]);
    return redirect()->back();

  }

  public function indexNovaCategoria()
  {
    return view('shop/novaCategoria');
  }

  public function criarCategoria() {
    \DB::table('categoriaproduto')->insert(['nomeCategoria' => $_GET['nomeCat'],]);
    return redirect()->back();

  }

  public function indexEliminarProduto()
  {
    $produtos= \DB::table('products')->get();
    return view('shop/eliminarProduto', ['produtos' => $produtos]);
  }

  public function eliminarProduto() {
    \DB::table('products')->where('nomeProduto', $_GET['nomeProd'])->delete();
    return redirect()->back();

  }

  public function indexEliminarCategoria()
  {
    $categorias= \DB::table('categoriaproduto')->get();
    return view('shop/eliminarCategoria', ['categorias' => $categorias]);
  }

  public function eliminarCategoria() {
    try {
      \DB::table('categoriaproduto')->where('nomeCategoria', $_GET['nomeCat'])->delete();
      return redirect()->back();
    } catch (\Exception $e) {
      ?>
      <script>
      alert("Esta categoria tem um ou mais produtos associados, porisso não pode ser eliminada!!");
      </script><?php
      return view('shop/shop');    }
  }


  public function removeRow($id) {


    $rows  = \Cart::content();
    $rowId = $rows->where('id', $id)->first()->rowId;
    \Cart::remove($rowId);

    return redirect()->back()->withInput();
  }
}
