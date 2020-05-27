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
Route::get ('/home', function() {
return view ('user/dashboard') -> middleware('auth');
});
//_______________________________________________________________//
//Cantina//

Route::get('/verifySenha', [

  'uses' =>'CantinaController@verifySenha',
  'as' =>'verifySenha',
]);

Route::get('/refeitorio', 'CantinaController@indexCantina')->name('indexCantina')->middleware('auth');

//________________________________________________//

//WEB//
Route::get ('/dashboard', function() {
return view ('user/dashboard');
});

Route::get('/user', function(){
  return view ('user/user') -> middleware('auth');

});

Route::get('/transactions', function(){
return view ('user/transactions') -> middleware('auth');

});

Route::get('/apanel', function(){
return view ('admin/panel');
});

Route::any ('/configs', function() {
  return view ('user/configs');
});

Route::any('/notifications', function() {
return view('pageextensions/notifications');

});
Route::get('remNot/{id?}',[
  'uses' => 'NotificationsController@remNot',
  'as' => 'rN'
]);
//Senhas//
Route::get('/dashboard/comprarSenhas', 'SenhasController@comprarSenhas')->name('cS');
Route::get('/dashboard/anularSenha', 'SenhasController@anularSenha')->name('aS');

//ExtSenhas//
Route::get('/MSenhas',[
  'uses' => 'SenhasController@showSenha',
  'as' => 'Ms'
]);
Route::any ('/MaisSenhas', function() {
  return view ('pageextensions/senhasExt');
});
//________________________________________________//

//ConfirmaçãoSenhaDiaria//

Route::any('/dashboard/showsenhadiaria', 'SenhasController@showsenhadiaria')->name('sd');

//____________________________//

//SAE//
Route::get ('/saelogin', function() {
return view ('sae/saelogin');
});

Route::get ('/password', function() {
return view ('sae/saelogin-password');
});

Route::any ('/portaria', function() {
  return view ('sae/portaria');
});
//__________________________________________________//

//Secretaria//
Route::get('secretaria', 'SecretariaController@EeS')->name('indexSecretaria');

Route::get('/listagem', function(){
  return view ('sae/secretaria/listagem');
});

Route::get ('/gestaousers', function(){
return view ('sae/secretaria/gestaouser');
});

//Secretaria--->PDFs//

Route::get('/carregamentos_diarios/pdf', 'ListagensController@pdf2');

//______________________________________________________________//

//Secretaria ----------> Tasks
Route::any ('/tarefaSubmit', 'TasksController@novaTask') -> name('tarefaSubmit') -> middleware('auth');
Route::get('remTask/{id}',[
  'uses' => 'SecretariaController@remTask',
  'as' => 'rT'
]);
//__________________________________________________//

//PDFs//
Route::get('/transações/pdf', 'TransactionController@pdf');
Route::get('/refeicoes_consumidas/pdf', 'TransactionController@pdf1');

//____________________________________________________//

//SHOP//////////////////////////
Route::get('shop/pagina/{num}', 'ProductController@tabs')->name('tabs');
Route::get('visibilidade/pagina/{num}', 'ProductController@tabsVisib')->name('tabsVisib');
Route::get('visibilidade/changePagina/{id}]', 'ProductController@mudarPagina')->name('mudarPagina');
Route::get('visibilidade/changeOrder/{id}/{pag}]', 'ProductController@mudarPosicao')->name('mudarPosicao');

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
Route::get ('transactions', 'TransactionController@fullTransactions')->name('transactions')->middleware('auth');
//Route::get ('/dashboard', 'TransactionController@compactTransactions')->name('compactTransactions')->middleware('auth');
//Route::get ('/home', 'TransactionController@compactTransactions')->name('compactTransactions')->middleware('auth');

          //DataController
Route::get ('/user', 'DataController@getUserType')->name('getUserType')->middleware('auth');
Route::any ('/colorchange', 'DataController@changeColor')->name('/colorchange')->middleware('auth');
Route::any ('sae/secretaria/getuserdata','DataController@getUserbyProcesso') -> name ('/getUser') -> middleware('auth');
Route::any ('/gestaousers/alteruser','DataController@alterUser') -> name ('/alterUser') -> middleware('auth');


         //CardAuthController
Route::any ('/sae/ncartao', 'CardAuthController@cardLogin')->name('cardLogin');
Route::any ('/sae/password', 'CardAuthController@pswVerify')->name('pswVerify');
          //PermissionController
Route::any ('/permissions','PermissionController@PermissionsVrf')->name('PermissionVrf')->middleware('auth');
Route::any ('/redirect','CardRedirectController@CardRedirect')->middleware('auth');

        //AdminActionsController
// Model: Route::get ('', 'AdminActionsController@')->name('');
        //SenhasController
Route::any ('/criarsenha', 'SenhasController@addSenha')->name('addSenha');

Route::get ('/dashboard', 'SenhasController@showSenha')->middleware('auth');

                       //Route de teste:
Route::any ('/testesenhas', 'SenhasController@showSenha')->name('showSenha');

          //NotificationsController
Route::any ('/notificationsubmit', 'NotificationsController@getUserNotification') -> name ('/notificationsubmit') -> middleware('auth');
Route::get('/apanel',[
  'uses' => 'NotificationsController@showNotification',
  'as' => 'showNotification'
]);

Route::any ('/notifications', 'NotificationsController@NotificationsTable')->middleware('auth');





          //PortariaController
Route::get ('/portaria/registar', 'PortariaController@acessoPortaria') -> name ('/acessoPortaria') ->middleware('auth');


//);//
