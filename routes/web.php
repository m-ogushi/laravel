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
        /*
        Route::get('profile', function() {
        Route::get( '/', 'TopController@index' );
        })->middleware('auth');
        */

        // ログイン
        Route::get( 'login',  'AuthController@signIn' );
        Route::post( 'login', 'AuthController@signIn' );

        /*Route::filter('login', function() {
            if (Auth::check()) {
                return Redirect::to('/');
            }
        });
        */

        // ログアウト
        Route::get( 'logout', 'AuthController@signOut' );
    });

    Route::get( '/', 'TopController@index' );
    Route::post( '/', 'TopController@index' );
    Route::group( [ 'prefix' => 'member' ], function()
    {
        Route::get( 'select', 'TopController@selectMember' );
        Route::post( 'select', 'TopController@selectMember' );
        Route::post( 'update', 'TopController@updateMember' );
    });
});
