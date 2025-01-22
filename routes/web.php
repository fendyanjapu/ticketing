<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-aksi', [LoginController::class, 'loginAksi'])->name('login-aksi');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/ticket-aduan/{status}', [TicketController::class, 'aduan'])->name('ticket-aduan');

Route::resource('user', UserController::class)->except('show')->middleware('auth');
Route::resource('ticket', TicketController::class)->except('show')->middleware('auth');
