<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
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

Route::post('/follow/{user}', [FollowController::class, 'store']);

Route::get('/p/create', [PostController::class, 'create']);
Route::post('/p', [PostController::class, 'store']);
Route::get('/p/{post}', [PostController::class, 'show']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profiles.update');
