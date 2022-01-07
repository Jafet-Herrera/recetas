<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* 
    * Forma simplificada de apuntar a controlador con recursos.
    ! Nota: Es recomedable usar si estas trabajando con un proyecto grande.
    Vídeo 109 del #curso
*/
// Route::resources('recetas', 'RecetaController');

Route::get('/recetas', 'RecetaController@index')->name('recetas.index');

Route::get('/recetas/create', 'RecetaController@create')->name('recetas.create');

Route::post('/recetas', 'RecetaController@store')->name('recetas.store');

Route::get('/recetas/{receta}', 'RecetaController@show')->name('recetas.show');

Route::get('/recetas/{receta}/edit', 'RecetaController@edit')->name('recetas.edit');

Route::put('/recetas/{receta}','RecetaController@update')->name('recetas.update');

Route::delete('/recetas/{receta}', 'RecetaController@destroy')->name('recetas.destroy');



//perfiles
Route::get('/perfiles/{perfil}', 'PerfilController@show')->name('perfil.show');

//edit
Route::get('/perfiles/{perfil}/edit', 'PerfilController@edit')->name('perfil.edit');

Route::put('/perfiles/{perfil}', 'PerfilController@update')->name('perfil.update');


