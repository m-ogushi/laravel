<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group( [ 'namespace' => 'Web' ], function()
{
    Route::group( [ 'namespace' => 'Authority' ], function()
    {
        // ログイン
        Route::get( 'login',  'AuthController@signIn' );
        Route::post( 'login', 'AuthController@signIn' );
        // ログアウト
        Route::get( 'logout', 'AuthController@signOut' );
    });

    Route::get( '/', 'TopController@index' );
    Route::post( '/', 'TopController@index' );
    Route::post( '/member/select', 'TopController@selectMember' );
    Route::post( '/member/update', 'TopController@updateMember' );

});
