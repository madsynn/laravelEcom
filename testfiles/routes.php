<?php


/*
  |--------------------------------------------------------------------------
  | Frontend Routes
  |--------------------------------------------------------------------------
 */

$languages = LaravelLocalization::getSupportedLocales();
foreach ($languages as $language => $values) {
    $supportedLocales[] = $language;
}

$locale = Request::segment(1);
if (in_array($locale, $supportedLocales)) {
    LaravelLocalization::setLocale($locale);
    App::setLocale($locale);
}

Route::get('/', function () {
    return Redirect::to(LaravelLocalization::getCurrentLocale(), 302);
});


Route::group(['prefix' => LaravelLocalization::getCurrentLocale(), 'before' => ['localization', 'before']], function () {
    Session::put('my.locale', LaravelLocalization::getCurrentLocale());

    // frontend dashboard
    Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);


    Route::get('shop', [ 'as' => 'shop', 'uses' =>'ProductController@index']);
    Route::get('/product/{slug}/show', [ 'as' => 'product.view', 'uses' =>'ProductController@show']);
    Route::get('/product/{id}/photo/{photo_id}/delete',[ 'as' => '', 'uses' => 'ProductController@deletePhoto']);
    Route::get('/option/{id}/delete', [ 'as' => '', 'uses' => 'ProductController@deleteOption']);
    Route::get('/optionvalue/{id}/delete', [ 'as' => '', 'uses' => 'ProductController@deleteOptionValue']);
    Route::get('/search', [ 'as' => '', 'uses' => 'ProductController@search']);



});



/*
  |--------------------------------------------------------------------------
  | Backend Routes
  |--------------------------------------------------------------------------
 */

Route::group(['prefix' => LaravelLocalization::getCurrentLocale()], function () {
    Route::group([
        'prefix' => '/admin',
        'middleware' => ['before', 'sentinel.auth', 'sentinel.permission']
            ], function () {

      Route::get('products', [ 'as' => 'admin.products', 'uses' =>'EcomController@products']);
        Route::get('product/create', [ 'as' => 'admin.product.create', 'uses' =>'EcomController@createProduct']);
        Route::get('product/{id}/edit', [ 'as' => 'admin.product.edit', 'uses' =>'EcomController@editProduct']);

        Route::post('product/create', [ 'as' => 'product.store', 'uses' =>'ProductController@store']);
        Route::get('product/{id}/delete', [ 'as' => 'product.delete', 'uses' =>'ProductController@delete']);
        Route::post('product/{id}/edit', ['as' => 'product.edit', 'uses' =>'ProductController@edit']);

//      Route::resource('/admin/product', 'ProductController', ['names' => [
//          'index' => 'product.index',
//          'create' => 'product.create',
//          'store' => 'product.store',
//          'edit' => 'product.edit',
//          'update' => 'product.update',
//          'destroy' => 'product.destroy',
//      ]]);



    });



});


// login
// Route::get('/admin/login',  ['as' => 'admin.login', function () {return View::make('backend/auth/login'); } ]);

Route::group(array('namespace' => 'Admin'), function () {
    // admin auth
    Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'AuthController@getLogout'));
    Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'AuthController@getLogin'));
    Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'AuthController@postLogin'));
    Route::post('admin/login', array('as' => 'login', 'uses' => 'AuthController@postLogin'));
    // admin password reminder
    Route::get('admin/forgot-password', array('as' => 'admin.forgot.password', 'uses' => 'AuthController@getForgotPassword',));
    Route::post('admin/forgot-password', array('as' => 'admin.forgot.password.post', 'uses' => 'AuthController@postForgotPassword',));
    Route::get('admin/{id}/reset/{code}', array('as' => 'admin.reset.password', 'uses' => 'AuthController@getResetPassword',))->where('id', '[0-9]+');
    Route::post('admin/reset-password', array('as' => 'admin.reset.password.post', 'uses' => 'AuthController@postResetPassword',));
});
