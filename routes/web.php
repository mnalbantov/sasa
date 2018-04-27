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


Route::get('/', function () {
    return view('home');
});
Route::get('/results/{mode}', function ($mode) {
    if($mode == 'grid')
        return view('layouts.grid.results');
    return view('results');

});

Route::post('ads','AdController@getAds')->name('ads');
