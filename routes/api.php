<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas API para su aplicación. Estos
| RouteServiceProvider carga las rutas dentro de un grupo que
| se le asigna el grupo de middleware "api". ¡Disfruta creando tu API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.all');
Route::post('/usuarios', 'UsuarioController@store')->name('usuarios.store');

Route::get('/usuario/{id}/movies', 'MovieController@index')->name('movies');
Route::get('/movie/{movie}', 'MovieController@show')->name('movie');
Route::post('/usuario/{id}/movies', 'MovieController@store')->name('movies.store');
Route::put('/movie/{movie}', 'MovieController@update')->name('movies.update');
Route::delete('/movie/{movie}', 'MovieController@delete')->name('movies.delete');
