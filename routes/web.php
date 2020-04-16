<?php

//Start Page//
Route::get('/', function () {
    return view('auth/login');
});
//_______________________________________________________________//


//Auth//
Auth::routes();
Route::get('/logout', 'LogoutController@logout');

//________________________________________________________________//

//Home//
Route::get('/home', 'HomeController@fullTransactions')->name('home');
//_______________________________________________________________//


//WEB//
Route::get ('/dashboard', function() {
return view ('user/dashboard');
});

Route::get('/user', function(){
  return view ('user/user');

});

Route::get('/transactions', function(){
return view ('user/transactions');

});

Route::get('/apanel', function(){
return view ('admin/panel');
});

//________________________________________________//

//SAE//
Route::get ('/saelogin', function() {
return view ('sae/saelogin');
});

Route::get ('/password', function() {
return view ('sae/saelogin-password');
});
//__________________________________________________//


//SHOP//////////////////////////
//Route::group(['middleware' => 'auth'], function () {
Route::get('/here', 'HomeController@indexEscolha')->name('escolhaPosto');


Route::get('/shop', [

  'uses' =>'ProductController@getIndex',
  'as' =>'product.index',
]);
Route::get('/verifyCard', [

  'uses' =>'ProductController@verifyCard',
  'as' =>'verifyCard',
]);
Route::get('/visibilidade', [

  'uses' =>'ProductController@getIndexVisibilidade',
  'as' =>'visibilidade',
]);
Route::get('/visibilidadeOcultar/{id}', [

  'uses' =>'ProductController@ProdOcultar',
  'as' =>'visibilidadeOcultar',
]);
Route::get('/visibilidadeMostrar/{id}', [

  'uses' =>'ProductController@ProdMostrar',
  'as' =>'visibilidadeMostrar',
]);

Route::get('/add-to-cart/{id}/{nomeProduto}/{precoProduto}',[
  'uses' => 'ProductController@getAddToCart',
  'as' => 'product.addToCart'
]);

Route::get('/eliminar-cart',[
  'uses' => 'ProductController@destroy',
  'as' => 'cart.eliminar'
]);

    Route::get('/eliminar-prod/{id}',[
      'uses' => 'ProductController@removeRow',
      'as' => 'prod.eliminar'
    ]);

    Route::get('/pagar',[
      'uses' => 'OperationController@Pagar',
      'as' => 'pagar'
    ]);

Route::get('shop/Criacao', 'ProductController@indexCriar')->name('indexCriação');
Route::get('/criarCategoria',[
  'uses' => 'ProductController@criarCategoria',
  'as' => 'criar.cat'
]);
Route::get('/criarProduto',[
  'uses' => 'ProductController@criarProduto',
  'as' => 'criar.prod'
]);
Route::get('shop/GerirPreco', 'ProductController@indexGerirPreco')->name('indexGerirPreco');

Route::get('/gerir-preco',[
  'uses' => 'ProductController@gerirPreco',
  'as' => 'gerir.Preco'
]);

Route::get('shop/eliminar', 'ProductController@indexEliminar')->name('indexEliminar');

Route::get('/removerProduto',[
  'uses' => 'ProductController@eliminarProduto',
  'as' => 'eliminar.prod'
]);
Route::get('/removerCategoria',[
  'uses' => 'ProductController@eliminarCategoria',
  'as' => 'eliminar.cat'
]);

//});

//Controllers//
          //TransactionController
Route::get ('transactions', 'TransactionController@fullTransactions')->name('transactions');
Route::get ('/dashboard', 'TransactionController@compactTransactions')->name('compactTransactions');
Route::get ('/home', 'TransactionController@compactTransactions')->name('compactTransactions');

          //DataController
Route::get ('/user', 'DataController@getUserType')->name('getUserType');
         //CardAuthController
Route::get ('/sae/ncartao', 'CardAuthController@cardLogin')->name('cardLogin');
Route::any ('/sae/password', 'CardAuthController@pswVerify')->name('pswVerify');
          //PermissionController
Route::post ('/sae/permissions','PermissionController@PermissionVrf') ->name('PermissionVrf');
        //AdminActionsController
// Model: Route::get ('', 'AdminActionsController@')->name('');

//__________________________________________________//
