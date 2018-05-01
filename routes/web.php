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
Route::group(['middleware'=>['web','auth']],function (){
    Route::get('/profile','UserController@index')->name('profile');
});
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register','Auth\RegisterController@register')->name('register.post');
Route::get('/password/reset/','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::get('/password/reset/{token?}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request');

Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/login','Auth\LoginController@showLoginForm')->name('register');
Route::get('/results/{mode}', function ($mode) {
    if ($mode == 'grid')
        return view('layouts.grid.results');
    return view('results');

});

Route::post('ads', 'AdController@getAds')->name('ads');
Route::get('users/{id}', 'AdController@user')->name('user');
