<?php
namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Session;
class OperationController extends Controller
{
  public function Pagar(){
    if (null != Session::get('idC')) {
      $idC = Session::get('idC');
    foreach(\Cart::content() as $product){
      $total=$product->price * $product->qty;
      $user = \DB::table('users')->where('numCartao', $idC)->first();
      \DB::table('users')->where('numCartao', $idC)->update(['saldo' => $user->saldo - $total]);
      \DB::table('operacoes')->insert(
        ['valorOperacao' => $total,
        'nomeOperacao' => 'Compra',
        'idProduto' => $product->id,
        'idUtilizador' =>  $user->id,
        'quantidade' => $product->qty,
      ]);
      $VV= \DB::table('products')->where('id', $product->id)->first();
      \DB::table('products')->where('id', $product->id)->update(['VezesVendido' => $VV->VezesVendido + 1]);

      }
    \Cart::destroy();
    Session::forget('idC');
    return redirect()->route('product.index');
  }else {
    echo '<script type="text/javascript">';
    echo ' alert("Ninguém passou o cartão!!")';
    echo '</script>';
    header("Refresh:0; url='shop'");
  }
}
}
