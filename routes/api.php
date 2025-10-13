<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;

// 임시로 다른 리소스를 위한 더미 라우트 추가 (링크 생성을 위해)
Route::get('/users/{user}', function () {})->name('api.users.show');
Route::get('/comments/{comment}', function () {})->name('api.comments.show');

// Article 리소스 컨트롤러 라우트
Route::apiResource('articles', ArticleController::class)->names('api.articles');
