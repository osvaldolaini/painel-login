<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
/*Rotas Painel*/
/*Middleware RegisterLogging registra toda navegação do usuário*/
Route::group(['namespace' => 'Admin','middleware' => ['auth','RegisterLogging']], function () {
    /**Basic */
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/home', 'HomeController@index')->name('admin.home');
    Route::get('/painel-admin', 'HomeController@index')->name('admin.home');
    Route::get('/configuracoes','ConfigController@index')->name('admin.config.index')->middleware('AccessLevel:1');
    Route::post('/configuracoes/{config}','ConfigController@update')->name('config.update')->middleware('AccessLevel:1');
    Route::post('/uploads','UploadController@upload')->name('uploads');
    Route::resource('/usuarios','UserController')->names('user')->parameters(['usuarios' => 'user'])->middleware('AccessLevel:10');
    
    /*Envio de ameil */
    Route::post('/send-response/{email}','EmailController@response')->name('email.response')->middleware('AccessLevel:10');
    Route::post('/send-news','SubscriberController@sendMail')->name('subscriber.sendMail')->middleware('AccessLevel:10');
});

Route::group(['namespace' => 'Admin','middleware' => ['auth','RegisterLogging']], function () {
    /*Graficos */
    Route::get('/charts/first','ChartsController@first')->name('charts.first')->middleware('AccessLevel:10');
    Route::get('/charts/second','ChartsController@second')->name('charts.second')->middleware('AccessLevel:10');
    Route::get('/charts/third','ChartsController@third')->name('charts.third')->middleware('AccessLevel:10');
    /*Route::get('/charts/four','ChartsController@four')->name('charts.four')->middleware('AccessLevel:10');*/
});
