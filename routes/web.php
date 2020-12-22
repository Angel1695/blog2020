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
    if(Auth::check()){
        return view('indexadmin');
    }else{
        return redirect()->route('login');
    }
    
})->name('/');


Route::middleware('auth')->group(function(){

    Route::post('/sesiones','ComponentesController@sesiones');
    Route::get('/ver','ComponentesController@vista');    
    Route::get('/limpiarcampo','ComponentesController@limpiarcampo')->name('limpiarcampo');
    
    Route::resource('/lenguajes','LenguajesController');
    Route::resource('/capitulos','CapitulosController');
    Route::resource('/referencias','ReferenciasController');
    Route::resource('/practicas','PracticasController');
    Route::resource('/tablas','TablasController');
    Route::resource('/componentes','ComponentesController');
    Route::resource('/blogs','BlogController');
    Route::resource('/relaciones','relacionesController');
    Route::resource('/perfiles','PerfilesController');
    Route::resource('/informaciones','InformacionController');
    

    //plantillas
    Route::get('plantillaDefault/{id}', 'PlantillaController@index')->name('plantilladefault');
    
});

Route::get('/b', function () {
    return view('index');
});
Route::get('/formulario', function () {
    return view('admin.formulariob');
});

Route::get('/homenosotros', function () {
    return view('usuario.homenosotros');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
