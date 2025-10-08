<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\TestRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/home',
    function () {
        return view('home');
    }
)->name('home');

// 회원가입화면
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

// 회원가입처리
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

// 로그인화면
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');

// 로그인처리
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])
    ->middleware('guest');

// 로그아웃처리
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// GET 요청을 위한 뷰 표시 라우트
Route::get('/request-test', [TestRequestController::class, 'create'])->name('request.create');

// POST 요청을 처리할 라우트
Route::post('/request-test', [TestRequestController::class, 'store'])->name('request.store');