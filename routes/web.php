<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return redirect('/dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/action', [LoginController::class, 'actionLogin'])->name('login.action');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('dashboard', DashboardController::class)->middleware('auth');

Route::middleware('auth')->prefix('/profile')->name('profile.')->group(function() {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::post('/update', [ProfileController::class, 'update'])->name('update');
    Route::post('/update/image', [ProfileController::class, 'updateImage'])->name('updateImage');
    Route::delete('/delete/image', [ProfileController::class, 'deleteImage'])->name('deleteImage');
});

Route::middleware('auth')->prefix('/kost')->name('kost.')->group(function() {
    Route::get('/', [KostController::class, 'index'])->name('index');
    Route::post('/store', [KostController::class, 'store'])->name('store');
    Route::post('/update', [KostController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [KostController::class, 'delete'])->name('delete');
}); 

Route::middleware('auth')->prefix('/berita')->name('berita.')->group(function() {
    Route::get('/', [BeritaController::class, "index"])->name("index");
    Route::post('/store', [BeritaController::class, "store"])->name("store");
    Route::post('/update', [BeritaController::class, "update"])->name("update");
    Route::delete('/delete/{id}', [BeritaController::class, "delete"])->name("delete");
});

Route::middleware('auth')->prefix('/users')->name('users.')->group(function() {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::post('/store', [UsersController::class, 'store'])->name('store');
    Route::post('/update', [UsersController::class, 'update'])->name('update');
    Route::post('/update-password', [UsersController::class, 'updatePassword'])->name('updatePassword');
    Route::delete('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
});