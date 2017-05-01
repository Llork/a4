<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// added 4-30-2017:
Route::get('/', function() {
  return ('Welcome to Assignment 4');
});





/**
* Log viewer
* (only accessible locally)
*/
//if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
//}

/* commented out 4-30-2017:
Route::get('/', function () {
    return view('welcome');
});
*/
