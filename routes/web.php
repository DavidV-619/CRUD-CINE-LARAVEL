<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MPeliculaController;
use App\Models\M_pelicula;

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
    return view('auth.login');
});

/*Route::get('/pelicula', function () {
    return view('pelicula.index');
});

Route::get('/pelicula/create',[MPeliculaController::class, 'create']);*/

Route::resource('pelicula',MPeliculaController::class);
Auth::routes();

Route::get('/home', [MPeliculaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [MPeliculaController::class, 'index'])->name('home');
});