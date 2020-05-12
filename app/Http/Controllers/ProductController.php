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

    $products = Produto::where('visibilidade', 1)->orderBy('VezesVendido', 'desc')->take(15)->get();
    Session::forget('user');
    return view('shop/shop', ['products' => $products,'activepage'=>1]);

  }
  public function tabs($num) {
    $Pcount = Produto::where('visibilidade', 1)->where('NoPagina', $num)->count();
    if ($num==1) {
      $products = Produto::where('visibilidade', 1)->orderBy('VezesVendido', 'desc')->take(15)->get();
        return view('shop/shop', ['products' => $products,'activepage'=>1]);

    }else{
      $products = Produto::where('visibilidade', 1)->where('NoPagina', $num)->get();
        return view('shop/shop', ['products' => $products,'activepage'=>$num]);

    }
  }
  public function verifyCard(){
    if ($_GET['input']!=null) {
      if (\DB::table('users')->where('numCartao', $_GET['input'])->first()) {
        $products = Produto::where('visibilidade', 1)->orderBy('VezesVendido', 'desc')->take(15)->get();
        $user = User::where('numCartao', $_GET['input'])->first();
        Session::forget('user');
        if (\DB::table('portaria')->where('numProcesso',$user->numProcesso)->where('valor',1)->first()) {
          session(['idC' => $_GET['input'],'user' => $user]);

          return view('shop/shop', ['products' => $products,'user' => $user, 'idC' => $_GET['input'],'activepage'=>1]);
        }else {
          echo '<script type="text/javascript">';
          echo ' alert("Não passou o cartão na portaria!!")';
          echo '</script>';
          header("Refresh:.25; url='shop'");
        }

      }else {
        echo '<script type="text/javascript">';
        echo ' alert("Não existe nenhum cartão acossiado a este número!!")';
        echo '</script>';
        $products = Produto::where('visibilidade', 1)->where('NoPagina', 1)->get();
        return view('shop/shop', ['products' => $products,'activepage'=>1]);
      }
    }else{
      $products = Produto::where('visibilidade', 1)->where('NoPagina', 1)->get();
      return view('shop/shop', ['products' => $products,'activepage'=>1]);
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
    $products = Produto::where('visibilidade',1)->orderBy('VezesVendido', 'desc')->take(15)->get();
    return view('shop/showorhidde', ['products' => $products,'activepage'=>1]);
  }
  public function tabsVisib($num)
  {
    $Pcount = Produto::where('NoPagina', $num)->count();
    if ($num==1) {
      $products = Produto::where('visibilidade',1)->orderBy('VezesVendido', 'desc')->take(15)->get();
      return view('shop/showorhidde', ['products' => $products,'activepage'=>1]);

    }if ($num==15) {
      $products = Produto::where('visibilidade',0)->orderBy('ordem', 'asc')->get();
      return view('shop/showorhidde', ['products' => $products,'activepage'=>15]);
    }else {
      if ($Pcount>=15) {
        $P = Produto::where('visibilidade',1)->where('NoPagina', $num)->get();
        $i=0;
        foreach ($P as $P) {

          if ($i>=15) {
            \DB::table('produtos')->where('id',$P->id)->update(['Nopagina' => $num+1]);
          }
          $i++;
        }
      }
      $products = Produto::where('NoPagina', $num)->where('visibilidade', 1)->orderBy('ordem','asc')->get();
      return view('shop/showorhidde', ['products' => $products, 'NOTpagina1' =>true,'activepage'=>$num]);
}
    }
    public function ProdOcultar($id)
    {
      \DB::table('produtos')->where('id',$id)->update(['visibilidade' => 0]);
      return redirect()->back()->withInput();
    }
    public function ProdMostrar($id)
    {
      \DB::table('produtos')->where('id',$id)->update(['visibilidade' => 1]);
      \DB::table('produtos')->where('id',$id)->update(['Nopagina' => $_GET['pag']]);
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
        \DB::table('produtos')->insert(
          ['nomeProduto' => $_GET['nomeProd'],
          'precoProduto' => $_GET['precoProd'],
          'idCategoria' =>  $_SESSION['categoriaShop'],
          'visibilidade' => 0,
          'ordem' => $lastM1,
          'NoPagina' => 15,

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
      if(\DB::table('operacao')->where('id',7)->first()){
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
    public function mudarPagina($id) {
      $Pcount = Produto::where('visibilidade', 1)->where('NoPagina', $_GET['pag'])->count();
      if ($Pcount>=15) {
        $pag= $_GET['pag'];

        echo '<script type="text/javascript">';
        echo ' alert("A página que introduziu encontra-se cheia! Por favor remova um item.")';
        echo '</script>';
        header("Refresh:.25;location:javascript://history.go(-1)");

      }else {
        \DB::table('produtos')->where('id',$id)->update(['Nopagina' => $_GET['pag']]);
        return redirect()->back();

      }
  }      //\DB::table('produtos')->where('id',$id)->update(['ordem' => $_GET['posicao']]);

  public function mudarPosicao($id,$pag) {
      $ordem= 1;
      $posicao=$_GET['posicao']-.5;
      \DB::table('produtos')->where('id',$id)->update(['ordem' => $posicao]);
      $prod = Produto::where('visibilidade', 1)->where('NoPagina', $pag)->orderBy('ordem','asc')->get();

      foreach ($prod as $p) {
        \DB::table('produtos')->where('Nopagina',$pag)->where('id',$p->id)->update(['ordem' => $ordem]);
        $ordem ++;
      }
      return redirect()->back();

    }

    public function showSenha(){

      $dataatual = date("Y-m-d");

      $senha = \DB::table('refeicao')->where('dataRefeicao','>', $dataatual )->orderBy ('dataRefeicao' , 'ASC')->limit(7)->get();
      echo $senha->dataRefeicao;;
      header("Refresh:.25;location:javascript://history.go(-1)");
      return view('shop/teste', ['senha' => $senha,'data' =>$dataatual]);



  }
}
