<?php

Route::group([
    'prefix' => mg_base_url(),
    'namespace' => 'Mg\TradeTracker\Controllers'], function() {

    Route::group(['prefix' => '/api'], function() {
        Route::get('/xml', 'HomeController@parse');
        Route::post('/xml', 'HomeController@parse');
    });

    Route::group(['prefix' => '/'], function() {
        Route::get('/', 'HomeController@index');
        Route::get('/index', 'HomeController@index');

        // any matching other redirect
        Route::get('/{any}', 'HomeController@index')->where('any', '.*');
    });
});

Route::get('/', function() {
    return redirect(mg_base_url());
});
