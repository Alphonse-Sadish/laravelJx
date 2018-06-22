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

// Verify if auth and role admin == true
Route::group(['middleware' => 'admin'],function (){

    Route::resource('categories','CategorieController');

    Route::resource('plateformes','PlateformeController');

    Route::resource('users','UserController');

    Route::resource('avis','AvisController');

    Route::resource('commentaires','CommentaireController');


});

// Verify if auth == true
Route::group(['middleware' => 'auth'],function (){

    Route::get('/home', 'HomeController@index');

    Route::get('/dons', 'DonsController@index');


    Route::get('/achat', 'DonsController@achat');

    Route::get('/achatJeux/{params}', 'JeuxController@achatJeux');

    Route::get('/sell','JeuxController@sell');

    Route::get('/renseignement/{params}','JeuxController@validatesell');

    Route::get('/categJeux/{element}','JeuxController@categJeux');

    Route::resource('monavis','MonavisController');

    Route::get('/jeuxadd','JeuxController@add');

    Route::get('/storeJeux','JeuxController@storeJeux');


});


    Route::get('/jeux','JeuxController@jeux');

    Auth::routes();









