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
