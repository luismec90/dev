<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
/* Home */
Route::get('/', array('as' => 'home', 'uses' => 'PagesController@home'));

/* Search */
Route::get('/busqueda', array('as' => 'search_path', 'uses' => 'SearchesController@index'));

/* Contact */
Route::get('/contacto', array('as' => 'contact_path', 'uses' => 'PagesController@contact'));
Route::post('/contacto', array('as' => 'contact_path', 'uses' => 'PagesController@sendContact'));

Route::get('saldo', array('before' => 'auth', 'as' => 'summary_path', 'uses' => 'PagesController@balance'));

/* Register */
Route::get('registro', array('before' => 'guest', 'as' => 'register_path', 'uses' => 'RegistrationController@create'));
Route::post('registro', array('before' => 'guest', 'as' => 'register_path', 'uses' => 'RegistrationController@store'));
Route::get('register/verify/{confirmationCode}', ['as' => 'confirmation_path', 'uses' => 'RegistrationController@confirm']);

/* Sesiones */
Route::get('entrar', array('before' => 'guest', 'as' => 'login_path', 'uses' => 'SessionsController@create'));
Route::post('entrar', array('before' => 'guest', 'as' => 'login_path', 'uses' => 'SessionsController@store'));
Route::get('salir', array('before' => 'auth', 'as' => 'logout_path', 'uses' => 'SessionsController@destroy'));

/* Password reset */
Route::controller('password', 'RemindersController');

/* Profile */
Route::get('perfil', array('before' => 'auth', 'as' => 'profile_path', 'uses' => 'UsersController@showProfile'));
Route::post('perfil', array('before' => 'auth', 'as' => 'update_profile_path', 'uses' => 'UsersController@updateProfile'));
Route::get('perfil/password', array('before' => 'auth', 'as' => 'password_path', 'uses' => 'UsersController@showPassword'));
Route::post('perfil/password', array('before' => 'auth', 'as' => 'update_password_path', 'uses' => 'UsersController@updatePassword'));

/* Login or Register with Social Networks */
Route::get('login_facebook', array('before' => 'guest', 'as' => 'login_facebook_path', 'uses' => 'SocialNetworksController@loginWithFacebook'));
Route::get('login_twitter', array('before' => 'guest', 'as' => 'login_twitter_path', 'uses' => 'SocialNetworksController@loginWithTwitter'));
Route::get('login_google', array('before' => 'guest', 'as' => 'login_google_path', 'uses' => 'SocialNetworksController@loginWithGoogle'));



Route::group(array('prefix' => '{shop_link}'), function () {

    /*Zona de administracion*/
    Route::group(array('prefix' => 'admin'), function () {
        Route::get('/', array('before' => 'auth|admin','as' => 'bill_path', 'uses' => 'BillsController@create'));
        Route::post('/', array('before' => 'auth|admin','as' => 'bill_path', 'uses' => 'BillsController@store'));
    });


    Route::get('/', array('as' => 'shop_path', 'uses' => 'ShopsController@show'));
    Route::get('/localizacion', array('as' => 'localization_path', 'uses' => 'ShopsController@localization'));

    Route::post('{category}/{product}/{id}/review', array('as' => 'review_path', 'uses' => 'ProductsController@saveReview'));

    Route::get('/domicilios/', array('before' => 'auth','as' => 'delivery_path', 'uses' => 'DeliveriesController@create'));
    Route::get('/domicilios/{product_id}', array('before' => 'auth','as' => 'product_delivery_path', 'uses' => 'DeliveriesController@create'));
    Route::post('/domicilios', array('before' => 'auth','as' => 'delivery_path', 'uses' => 'DeliveriesController@store'));

    Route::post('afiliarse', array('as' => 'member_path', 'uses' => 'MembersController@store'));

    Route::delete('afiliarse', array('as' => 'member_path', 'uses' => 'MembersController@destroy'));


    Route::get('/{category}', array('as' => 'category_path', 'uses' => 'CategoriesController@show'));
    Route::get('/{category}/{product}', array('as' => 'product_path', 'uses' => 'ProductsController@show'));





/*



    Route::get('/categorias', array('before' => 'auth|admin', 'as' => 'admin_category_path', 'uses' => 'ShopsController@adminCategories'));
    Route::get('/categorias/{category}', array('before' => 'auth|admin', 'as' => 'admin_show_category_path', 'uses' => 'CategoriesController@adminShow'));
    Route::get('/categorias/editar/{category}', array('before' => 'auth|admin', 'as' => 'admin_edit_category_path', 'uses' => 'CategoriesController@adminEdit'));
    Route::post('/categorias/actualizar/{category}', array('before' => 'auth|admin', 'as' => 'admin_update_category_path', 'uses' => 'CategoriesController@adminUpdate'));
    Route::delete('/categorias/eliminar/{category}', array('before' => 'auth|admin', 'as' => 'admin_destroy_category_path', 'uses' => 'CategoriesController@adminDestroy'));

    Route::get('/categorias/{category}/editar/{product}', array('before' => 'auth|admin', 'as' => 'admin_edit_product_path', 'uses' => 'ProductsController@adminEdit'));
    Route::post('/categorias/{category}/actualizar/{product}', array('before' => 'auth|admin', 'as' => 'admin_update_product_path', 'uses' => 'ProductsController@adminUpdate'));
    Route::delete('/categorias/{category}/eliminar/{product}', array('before' => 'auth|admin', 'as' => 'admin_destroy_product_path', 'uses' => 'ProductsController@adminDestroy'));

    Route::get('/venta', array('before' => 'auth|admin', 'as' => 'sale_path', 'uses' => 'SalesController@create'));


    Route::get('/contacto', array('as' => 'contact_shop_path', 'uses' => 'ShopsController@contact'));

*/
});


