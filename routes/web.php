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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function()
{
    return View::make('hello', array('name'=>'8miricd'));
});

Route::get('foo', function () {
    return 'Hello World';
});

Route::get('/test', 'TestController@index');

Route::get('/name/{name}', 'TestController@name');

