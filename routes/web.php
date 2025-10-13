<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\TestRequestController;
use App\Http\Controllers\ValidateTestController;

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

// '/validate' 경로에 대한 GET 요청은 ValidateTestController의 create 메서드를 호출하여 가입 폼을 보여줌
Route::get('/validate', [ValidateTestController::class, 'create'])
    ->name('validate.create');

// '/validate' 경로에 대한 POST 요청은 ValidateTestController의 store 메서드를 호출하여 가입 정보를 처리함
Route::post('/validate', [ValidateTestController::class, 'store'])
    ->name('validate.store');

// 가입 완료 페이지
Route::get('/validate/complete', function () {
    return view('valid.complete');
})->name('validate.complete');