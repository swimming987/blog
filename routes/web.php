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
    return view('welcome');
});
Route::get('noaccess','Admin\LoginController@noaccess');
Route::get('code/captcha/{tmp}','Admin\LoginController@captcha');
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::get('login','LoginController@login');
    Route::get('logout','LoginController@logout');
    Route::get('code','LoginController@code');
    Route::post('doLogin','LoginController@doLogin');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['isLogin','hasRole']],function (){
    Route::get('index','LoginController@index');
    Route::get('welcome','LoginController@welcome');
    Route::get('logout','LoginController@logout');
    Route::get('user/del','UserController@delAll');
    Route::resource('user', 'UserController');
    Route::get('role/auth/{id}','RoleController@auth');
    Route::post('role/doAuth','RoleController@doAuth');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::post('cate/changeorder', 'CateController@changeorder');
    Route::resource('cate', 'CateController');
    Route::post('article/upload', 'ArticleController@upload');
    Route::resource('article', 'ArticleController');
});
