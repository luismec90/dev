<?php

/* Home */
Route::get('/establecimientos', array('as' => 'home_shops_path', 'uses' => 'PagesController@shops'));

Route::get('/usuarios', array('as' => 'home_buyer_path', 'uses' => 'PagesController@buyers'));

Route::get('/test', array('as' => 'test', 'uses' => 'PagesController@test'));

Route::get('/', array('as' => 'home', 'uses' => 'PagesController@shops'));
/* ---------- */

/* Search */
Route::get('/busqueda', array('as' => 'search_path', 'uses' => 'SearchesController@index'));

/* Contact */
Route::get('/contacto', array('as' => 'contact_path', 'uses' => 'PagesController@contact'));
Route::post('/contacto', array('as' => 'contact_path', 'uses' => 'PagesController@sendContact'));

/* Terminos y condiciones */
Route::get('terminos-y-condiciones', array('as' => 'terms_path', 'uses' => 'PagesController@showTerms'));

/* Contact Pioner */
Route::get('/contacto/pionero', array('as' => 'contact_pioner_path', 'uses' => 'PagesController@contactPioner'));
Route::post('/contacto/pionero', array('as' => 'contact_pioner_path', 'uses' => 'PagesController@sendContactPioner'));



/* Listar establecimiento */
Route::get('listar', array('as' => 'listshops_path', 'uses' => 'PagesController@listShops'));

/* Recomendar */
Route::post('recomendar', array('as' => 'recommend_path', 'uses' => 'PagesController@recommend'));

/* Create Shop */
Route::get('/crear-establecimiento', array('before' => 'auth', 'as' => 'create_shop_path', 'uses' => 'ShopsController@create'));
Route::post('/crear-establecimientos', array('before' => 'auth', 'as' => 'store_shop_path', 'uses' => 'ShopsController@store'));


/* Mis sistios */
Route::get('mis-establecimientos', array('before' => 'auth', 'as' => 'mysites_path', 'uses' => 'PagesController@mySites'));

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

/*Notificactions*/
Route::get('notificaciones', array('before' => 'auth', 'as' => 'notifications_path', 'uses' => 'NotificationsController@index'));
Route::get('notificaciones/{notification_id}', array('before' => 'auth', 'as' => 'show_notification_path', 'uses' => 'NotificationsController@show'));


/* Complete registration */
Route::get('completar_registro/{shop_link}/{user_email}/{token}', array('as' => 'complete_registration', 'uses' => 'RegistrationController@completeRegistration'));
Route::post('completar_registro/{shop_link}/{user_email}/{token}', array('as' => 'complete_registration', 'uses' => 'RegistrationController@endRegistration'));


/* Login or Register with Social Networks */
Route::get('login_facebook', array('before' => 'guest', 'as' => 'login_facebook_path', 'uses' => 'SocialNetworksController@loginWithFacebook'));
Route::get('login_twitter', array('before' => 'guest', 'as' => 'login_twitter_path', 'uses' => 'SocialNetworksController@loginWithTwitter'));
Route::get('login_google', array('before' => 'guest', 'as' => 'login_google_path', 'uses' => 'SocialNetworksController@loginWithGoogle'));

Route::get('info_user', array('as' => 'info_user_path', 'uses' => 'UsersController@infoUser'));


Route::group(array('prefix' => '{shop_link}'), function ()
{
    /*Zona de administracion*/
    Route::group(array('prefix' => 'admin'), function ()
    {
        Route::get('/venta', array('before' => 'auth|admin', 'as' => 'bill_path', 'uses' => 'BillsController@create'));

        //Route::post('/venta', array('before' => 'auth|admin', 'as' => 'bill_path', 'uses' => 'BillsController@store'));
        Route::post('/venta_ajax', array('before' => 'auth|admin', 'as' => 'bill_store_path', 'uses' => 'BillsController@store'));

        Route::get('/getuser', array('before' => 'auth|admin', 'as' => 'getuser_path', 'uses' => 'UsersController@getUser'));
        Route::get('/autouseremail', array('before' => 'auth|admin', 'as' => 'autouseremail_path', 'uses' => 'UsersController@autocompleteEmailUser'));
        Route::get('/categorias', array('before' => 'auth|admin', 'as' => 'admin_category_path', 'uses' => 'CategoriesController@index'));
        Route::get('/categorias/crear', array('before' => 'auth|admin', 'as' => 'admin_create_category_path', 'uses' => 'CategoriesController@create'));
        Route::post('/categorias/crear', array('before' => 'auth|admin', 'as' => 'admin_store_category_path', 'uses' => 'CategoriesController@store'));
        Route::get('/categorias/editar/{category_id}', array('before' => 'auth|admin', 'as' => 'admin_edit_category_path', 'uses' => 'CategoriesController@edit'));
        Route::post('/categorias/editar/{category_id}', array('before' => 'auth|admin', 'as' => 'admin_update_category_path', 'uses' => 'CategoriesController@update'));
        Route::delete('/categorias/eliminar/{category_id}', array('before' => 'auth|admin', 'as' => 'admin_destroy_category_path', 'uses' => 'CategoriesController@destroy'));

        Route::get('/categorias/{category_id}', array('before' => 'auth|admin', 'as' => 'admin_products_path', 'uses' => 'ProductsController@index'));
        Route::get('/categorias/{category_id}/productos/crear', array('before' => 'auth|admin', 'as' => 'admin_create_product_path', 'uses' => 'ProductsController@create'));
        Route::post('/categorias/{category_id}/productos/crear', array('before' => 'auth|admin', 'as' => 'admin_store_product_path', 'uses' => 'ProductsController@store'));
        Route::get('/categorias/{category_id}/productos/editar/{product_id}', array('before' => 'auth|admin', 'as' => 'admin_edit_product_path', 'uses' => 'ProductsController@edit'));
        Route::post('/categorias/{category_id}/productos/editar/{product_id}', array('before' => 'auth|admin', 'as' => 'admin_update_product_path', 'uses' => 'ProductsController@update'));
        Route::delete('/categorias/{category_id}/productos/eliminar/{product_id}', array('before' => 'auth|admin', 'as' => 'admin_destroy_product_path', 'uses' => 'ProductsController@destroy'));

        Route::get('/suscripciones', array('before' => 'auth|admin', 'as' => 'subscriptions_path', 'uses' => 'ShopsController@subscriptions'));
        Route::get('/suscripciones/exportar', array('before' => 'auth|admin', 'as' => 'export_subscriptions_path', 'uses' => 'ShopsController@exportSubscriptions'));

        Route::get('/informacion-general', array('before' => 'auth|admin', 'as' => 'edit_general_information_path', 'uses' => 'ShopsController@generalInformation'));
        Route::post('/informacion-general', array('before' => 'auth|admin', 'as' => 'update_general_information_path', 'uses' => 'ShopsController@updateGeneralInformation'));

        Route::get('ventas', array('before' => 'auth|admin', 'as' => 'sales_report_path', 'uses' => 'ReportsController@indexSales'));
        Route::get('ventas/exportar', array('before' => 'auth|admin', 'as' => 'export_sales_report_path', 'uses' => 'ReportsController@exportSales'));

        /* Statistics */
        Route::get('estadisticas', array('before' => 'auth|admin', 'as' => 'statistics_path', 'uses' => 'StatisticsController@index'));

        /* Stocks */
        Route::get('inventario', array('before' => 'auth|admin', 'as' => 'stock_path', 'uses' => 'StocksController@index'));
        Route::get('inventario/crear', array('before' => 'auth|admin', 'as' => 'create_stock_path', 'uses' => 'StocksController@create'));
        Route::post('inventario/crear', array('before' => 'auth|admin', 'as' => 'store_stock_path', 'uses' => 'StocksController@store'));
        Route::get('inventario/editar/{cover_id}', array('before' => 'auth|admin', 'as' => 'edit_stock_path', 'uses' => 'StocksController@edit'));
        Route::post('inventario/editar/{stock_id}', array('before' => 'auth|admin', 'as' => 'update_stock_path', 'uses' => 'StocksController@update'));
        Route::delete('inventario/eliminar/{stock_id}', array('before' => 'auth|admin', 'as' => 'destroy_stock_path', 'uses' => 'StocksController@destroy'));
        Route::post('inventario/actualizarcantidad', array('before' => 'auth|admin', 'as' => 'update_amount_stock_path', 'uses' => 'StocksController@updateAmount'));
        Route::get('inventario/historico/{stock_id}', array('before' => 'auth|admin', 'as' => 'historic_stock_path', 'uses' => 'StocksController@historic'));
        Route::get('relacionar-producto-con-stock/{category_id}/{product_id}', array('before' => 'auth|admin', 'as' => 'relate_stock_product_path', 'uses' => 'StocksController@relateStockProduct'));
        Route::post('relacionar-producto-con-stock/{category_id}/{product_id}', array('before' => 'auth|admin', 'as' => 'store_relate_stock_product_path', 'uses' => 'StocksController@storeRelateStockProduct'));
        Route::post('relacionar-producto-con-stock/editar/{category_id}/{product_id}', array('before' => 'auth|admin', 'as' => 'update_relate_stock_product_path', 'uses' => 'StocksController@updateRelateStockProduct'));
        Route::delete('relacionar-producto-con-stock/{category_id}/{product_id}', array('before' => 'auth|admin', 'as' => 'destroy_relate_stock_product_path', 'uses' => 'StocksController@destroyRelateStockProduct'));

        /* Logo */
        Route::get('logo', array('before' => 'auth|admin', 'as' => 'logo_path', 'uses' => 'ShopsController@logo'));
        Route::post('logo', array('before' => 'auth|admin', 'as' => 'logo_path', 'uses' => 'ShopsController@storeLogo'));

        /* Covers */
        Route::get('covers', array('before' => 'auth|admin', 'as' => 'covers_path', 'uses' => 'CoversController@index'));
        Route::get('covers/crear', array('before' => 'auth|admin', 'as' => 'admin_create_cover_path', 'uses' => 'CoversController@create'));
        Route::post('covers/crear', array('before' => 'auth|admin', 'as' => 'admin_store_cover_path', 'uses' => 'CoversController@store'));
        Route::get('covers/editar/{cover_id}', array('before' => 'auth|admin', 'as' => 'admin_edit_cover_path', 'uses' => 'CoversController@edit'));
        Route::post('covers/editar/{cover_id}', array('before' => 'auth|admin', 'as' => 'admin_update_cover_path', 'uses' => 'CoversController@update'));
        Route::delete('covers/eliminar/{cover_id}', array('before' => 'auth|admin', 'as' => 'admin_destroy_cover_path', 'uses' => 'CoversController@destroy'));


        /* Alliances */


        Route::get('alianzas', array('before' => 'auth|admin', 'as' => 'alliances_path', 'uses' => 'AlliancesController@index'));
        Route::post('alianzas/solicitar', array('before' => 'auth|admin', 'as' => 'request_alliance_path', 'uses' => 'AlliancesController@requestAlliance'));


        Route::get('alianzas/enproceso', array('before' => 'auth|admin', 'as' => 'pending_alliances_path', 'uses' => 'AlliancesController@pendingAlliances'));
        Route::get('alianzas/enproceso/{alliance_id}', array('before' => 'auth|admin', 'as' => 'pending_alliance_path', 'uses' => 'AlliancesController@pendingAlliance'));
        Route::post('alianzas/enproceso/{alliance_id}/contrapropuesta', array('before' => 'auth|admin', 'as' => 'contra_request_alliance_path', 'uses' => 'AlliancesController@contraRequestAlliance'));
        Route::post('alianzas/enproceso/{alliance_id}/aceptar', array('before' => 'auth|admin', 'as' => 'accept_request_alliance_path', 'uses' => 'AlliancesController@acceptRequestAlliance'));
        Route::get('alianzas/activas', array('before' => 'auth|admin', 'as' => 'active_alliances_path', 'uses' => 'AlliancesController@activeAlliances'));
        Route::get('alianzas/activas/{alliance_id}', array('before' => 'auth|admin', 'as' => 'active_alliance_path', 'uses' => 'AlliancesController@activeAlliance'));
        Route::post('alianzas/activas/{alliance_id}/cancelar', array('before' => 'auth|admin', 'as' => 'cancel_alliance_path', 'uses' => 'AlliancesController@cancelAlliance'));

        /* Solicitar llamada  */
        Route::post('/solicitar-llamada', array('as' => 'request_call_path', 'uses' => 'SupportController@requestCall'));

    });


    Route::get('/', array('as' => 'shop_path', 'uses' => 'ShopsController@show'));
    Route::get('/localizacion', array('as' => 'localization_path', 'uses' => 'ShopsController@localization'));

    Route::post('{category}/{product}/{id}/review', array('as' => 'review_path', 'uses' => 'ProductsController@saveReview'));

    Route::get('/domicilios/', array('before' => 'auth', 'as' => 'delivery_path', 'uses' => 'DeliveriesController@create'));
    Route::get('/domicilios/{product_id}', array('before' => 'auth', 'as' => 'product_delivery_path', 'uses' => 'DeliveriesController@create'));
    Route::post('/domicilios', array('before' => 'auth', 'as' => 'delivery_path', 'uses' => 'DeliveriesController@store'));

    Route::post('afiliarse', array('as' => 'member_path', 'uses' => 'MembersController@store'));

    Route::delete('afiliarse', array('as' => 'member_path', 'uses' => 'MembersController@destroy'));


    Route::get('/{category}', array('as' => 'category_path', 'uses' => 'CategoriesController@show'));
    Route::get('/{category}/{product}', array('as' => 'product_path', 'uses' => 'ProductsController@show'));

    Route::delete('cancelar-venta', array('as' => 'delete_bill_path', 'uses' => 'BillsController@destroy'));

});


