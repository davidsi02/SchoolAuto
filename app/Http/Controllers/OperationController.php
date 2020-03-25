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
  public function Pagar($idC){
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
      return redirect()->route('login');

      }


    \Cart::destroy();

    Auth::logout();
    return redirect()->route('login');
  }
}
