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

/* commented out 4-30-2017:
Route::get('/', function () {
    return view('welcome');
});
*/
