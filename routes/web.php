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
Route::middleware(['auth'])->group(function(){
	Route::get('cours','App\Http\Controllers\CoursController@index')->name('cours.index');
    Route::get('cours/{id}','App\Http\Controllers\CoursController@show')->name('cours.show');
    Route::get('cours/edit/{id}','App\Http\Controllers\CoursController@edit')->name('cours.edit');
    Route::patch('cours/{id}','App\Http\Controllers\CoursController@update')->name('cours.update');
    Route::post('/progression','App\Http\Controllers\CoursController@progression')->name('progression');
	Route::get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
Route::post('/cours','App\Http\Controllers\CoursController@store');

});
