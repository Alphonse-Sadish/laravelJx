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


Auth::routes();

// Route Get

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dons', 'DonsController@index')->name('dons');

Route::get('/achatJeux/{element}', 'JeuxController@achatJeux');

Route::get('/sell','JeuxController@sell');

Route::get('/renseignement','JeuxController@validatesell');

Route::get('/renseignement','JeuxController@validatesell');

Route::get('/categJeux/{element}','JeuxController@categJeux');


Route::get('tournoi/', 'TournoiController@index');

Route::get('tournoi/add', 'TournoiController@create');

Route::post('tournoi/add', 'TournoiController@add');

Route::get('tournoi/show/{id}','TournoiController@show');

Route::get('tournoi/participe/{id}','TournoiController@participe');


// Route Resource

Route::resource('avis','AvisController');

Route::resource('categories','CategorieController');

Route::resource('commentaires','CommentaireController');

Route::resource('jeux','JeuxController');

Route::resource('messages','MessageController');

Route::resource('tournoi','TournoiController');

Route::resource('plateformes','PlateformeController');

Route::resource('users','UserController');