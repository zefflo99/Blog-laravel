<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blog\BlogController;
use App\Http\Controllers\auth\authController;
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

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('publication/creer', [BlogController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('publication/creer', [BlogController::class, 'store'])->middleware('auth');

// *** Authentification



Route::get('inscription', [authController::class, 'showRegister'])->name('auth.register')->middleware('guest');
Route::post('inscription', [authController::class, 'register'])->middleware('guest');

Route::get('connexion', [authController::class, 'showLogin'])->name('auth.login')->middleware('guest');
Route::post('connexion', [authController::class, 'login'])->middleware('guest');


Route::delete('/deconnexion', [authController::class, 'logout'])->name('auth.logout')->middleware('auth');
