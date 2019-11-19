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

Route::get('/', 'showMovies@show', 'userControl@stablish' );

Auth::routes();

Route::resource('/movie/modify', 'insertController');
Route::resource('/reserve', 'reservesController');
Route::get('view', 'Controller@SendMail');
Route::get('qr-code-g', function () {
  \QrCode::size(500)
            ->format('png')
            ->generate('ItSolutionStuff.com');
    
  return view('mail.test');
    
});