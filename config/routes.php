<?php

Route::group([
    'prefix' => mg_base_url(),
    'middleware' => ['web'],
    'namespace' => 'Mg\TradeTracker\Controllers'], function() {

    Route::group(['prefix' => '/api'], function() {
        
    });

    Route::group(['prefix' => '/'], function() {
        Route::get('/', 'HomeController@index');
        Route::get('/index', 'HomeController@index');

        // any matching other redirect
        Route::get('/{any}', 'HomeController@index')->where('any', '.*');
    });
});
