<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile', ProfileController::class)->only([
         'index', 'update'
     ]);

    Route::resource('kategori', KategoriController::class);
    
    Route::resource('pertanyaan', PertanyaanController::class)->except([
        'show', 'index'
    ]);
});


Route::resource('pertanyaan', PertanyaanController::class)->only(['show', 'index']);

Route::resource('jawaban', JawabanController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
