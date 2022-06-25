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

Route::get('/', \App\Http\Controllers\UsersController::class);
Route::get('/{user}', fn(\App\Models\User $user) => $user)->name('users.show');
Route::delete('/{user}', fn(\App\Models\User $user) => $user)->name('users.destroy');
