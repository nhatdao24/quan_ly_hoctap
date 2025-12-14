<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
include 'Admin.php';
include 'Client.php';
Route::get('/', [Auth::class, 'login'])->name('home')->middleware('check.login');
Route::get('/login', [Auth::class, 'login'])->name('login')->middleware('check.login');
Route::get('/register', [Auth::class, 'register'])->name('register')->middleware('check.login');

Route::post('/checkLogin', [Auth::class, 'checkLogin'])->name('checkLogin');
Route::post('/register', [Auth::class, 'createAccount'])->name('createAccount');

Route::get('/logout', [Auth::class, 'logout'])->name('logout');