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
return view ('user/dashboard') -> middleware('auth');
});

Route::get('/user', function(){
  return view ('user/user') -> middleware('auth');

});

Route::get('/transactions', function(){
return view ('user/transactions') -> middleware('auth');

});

Route::get('/apanel', function(){
return view ('admin/panel') -> middleware('auth');
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
Route::get('/shop', [

  'uses' =>'ProductController@getIndex',
  'as' =>'product.index',
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

Route::get('shop/novoProduto', 'ProductController@indexNovoProd')->name('novoProduto');
Route::get('/criarProduto',[
  'uses' => 'ProductController@criarProduto',
  'as' => 'prod.criar'
]);
Route::get('shop/GerirPreco', 'ProductController@indexGerirPreco')->name('indexGerirPreco');

Route::get('/gerir-preco',[
  'uses' => 'ProductController@gerirPreco',
  'as' => 'gerir.Preco'
]);
Route::get('shop/novaCategoria', 'ProductController@indexNovaCategoria')->name('indexNovaCategoria');

Route::get('/criarCategoria',[
  'uses' => 'ProductController@criarCategoria',
  'as' => 'criar.cat'
]);

Route::get('shop/eliminarProduto', 'ProductController@indexEliminarProduto')->name('indexEliminarProduto');

Route::get('/RemoverProduto',[
  'uses' => 'ProductController@eliminarProduto',
  'as' => 'prod.eliminar'
]);

Route::get('shop/eliminarCategoria', 'ProductController@indexEliminarCategoria')->name('indexEliminarCategoria');

Route::get('/removerCategoria',[
  'uses' => 'ProductController@eliminarCategoria',
  'as' => 'eliminar.cat'
]);
//});

//Controllers//
          //TransactionController
Route::get ('transactions', 'TransactionController@fullTransactions')->name('transactions')->middleware('auth');
Route::get ('/dashboard', 'TransactionController@compactTransactions')->name('compactTransactions')->middleware('auth');
Route::get ('/home', 'TransactionController@compactTransactions')->name('compactTransactions')->middleware('auth');

          //DataController
Route::get ('/user', 'DataController@getUserType')->name('getUserType')->middleware('auth')->middleware('auth');
         //CardAuthController
Route::any ('/sae/ncartao', 'CardAuthController@cardLogin')->name('cardLogin');
Route::any ('/sae/password', 'CardAuthController@pswVerify')->name('pswVerify');
          //PermissionController
Route::any ('/permissions','PermissionController@PermissionsVrf')->name('PermissionVrf')->middleware('auth');
        //AdminActionsController
// Model: Route::get ('', 'AdminActionsController@')->name('');

//__________________________________________________//
