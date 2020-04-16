<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Produto;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ProductController extends Controller
{

  public function getIndex(){


    $products = Produto::where('visibilidade', 1)->paginate(15);
    return view('shop/shop', ['products' => $products]);


  }
  public function verifyCard(){
    if ($_GET['input']) {
      if (\DB::table('users')->where('numCartao', $_GET['input'])->first()) {
        $products = Produto::where('visibilidade', 1)->where('idCategoria', 1)->paginate(15);
        $user = User::where('numCartao', $_GET['input'])->first();
        session(['idC' => $_GET['input']]);
        return view('shop/shop', ['products' => $products,'user' => $user, 'idC' => $_GET['input']]);
      }else {
        echo '<script type="text/javascript">';
        echo ' alert("Não existe nenhum cartão acossiado a este número!!")';
        echo '</script>';
        $products = Produto::where('visibilidade', 1)->where('idCategoria', 1)->paginate(15);
        return view('shop/shop', ['products' => $products]);
      }
    }else{
      $products = Produto::where('visibilidade', 1)->where('idCategoria', 1)->paginate(15);
      return view('shop/shop', ['products' => $products]);
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
    $products = Produto::paginate(15);
    return view('shop/ShowOrHidde', ['products' => $products]);
  }

  public function ProdOcultar($id)
  {
    \DB::table('produtos')->where('id',$id)->update(['visibilidade' => 0]);
    return redirect()->back()->withInput();
  }

  public function ProdMostrar($id)
  {
    \DB::table('produtos')->where('id',$id)->update(['visibilidade' => 1]);
    return redirect()->back()->withInput();
  }

  public function indexCriar()
  {
    $categorias= \DB::table('categoriaproduto')->get();
    return view('shop/criar', ['categorias' => $categorias]);
  }

  public function criarProduto() {

    if(\DB::table('produtos')->where('nomeProduto', $_GET['nomeProd'])->first()){
      echo '<script type="text/javascript">';
      echo ' alert("Este produto já existe!!")';
      echo '</script>';
      header("Refresh:.25; url='shop/Criacao'");
    }else{
      $last = \DB::table('produtos')->orderBy('ordem','desc')->first();
      $lastM1= $last->ordem + 1;
      $cat = \DB::table('categoriaproduto')->where('nomeCategoria', $_GET['nomeCat'])->first();
      \DB::table('produtos')->insert(
        ['nomeProduto' => $_GET['nomeProd'],
        'precoProduto' => $_GET['precoProd'],
        'idCategoria' => $cat->idCategoria,
        'visibilidade' => 1,
        'ordem' => $lastM1,

      ]);

      return redirect()->back();
    }
  }

  public function criarCategoria() {
    if(\DB::table('categoriaproduto')->where('nomeCategoria', $_GET['nomeCat'])->first()){
      echo '<script type="text/javascript">';
      echo ' alert("Esta categoria já existe!!")';
      echo '</script>';
      header("Refresh:.25; url='shop/Criacao'");
  }else {
    \DB::table('categoriaproduto')->insert(['nomeCategoria' => $_GET['nomeCat'],]);
  return redirect()->back();
  }
}

  public function indexGerirPreco()
  {
    $produtos= \DB::table('produtos')->get();
    return view('shop/gerirPreco', ['produtos' => $produtos]);
  }

  public function gerirPreco() {
    \DB::table('produtos')->where('nomeProduto', $_GET['nomeProd'])->update(['precoProduto' => $_GET['precoProd']]);
    return redirect()->back();

  }

  public function indexEliminar()
  {
    $categorias= \DB::table('categoriaproduto')->get();
    $produtos= \DB::table('produtos')->get();
    return view('shop/eliminar', ['categorias' => $categorias,'produtos' => $produtos]);
  }

  public function eliminarCategoria() {
    try {
      \DB::table('categoriaproduto')->where('nomeCategoria', $_GET['nomeCat'])->delete();
      return redirect()->back();
    } catch (\Exception $e) {
      echo '<script type="text/javascript">';
      echo ' alert("Esta Categoria tem produtos acossiados porisso não pode ser eliminada!!")';
      echo '</script>';
      header("Refresh:.25; url='shop/eliminar'");
    }
    }
    public function eliminarProduto() {
      $produto = \DB::table('produtos')->where('nomeProduto',$_GET['nomeProd'])->first();
      if(\DB::table('operacoes')->where('id',7)->first()){
        echo '<script type="text/javascript">';
        echo ' alert("Este produto não pode ser eliminado porque está associado a transações!!")';
        echo '</script>';
        header("Refresh:.25; url='shop/eliminar'");
      }else {
        \DB::table('produtos')->where('nomeProduto', $_GET['nomeProd'])->delete();
        $products = \DB::table('produtos')->orderBy('ordem','asc')->get();

        $ordem =0;
        foreach ($products as $row) {

          \DB::table('produtos')->where('id',$row->id)->update(['ordem' => $ordem]);
          $ordem++;
        }

        return redirect()->back();
      }

    }

    public function removeRow($id) {


      $rows  = \Cart::content();
      $rowId = $rows->where('id', $id)->first()->rowId;
      \Cart::remove($rowId);

      return redirect()->back()->withInput();
    }/*
    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));

            foreach($arr as $sortOrder => $id){
                $menu = Produto::find($id);
                $menu->ordem = $sortOrder;
                $menu->save();
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }*/
  }
