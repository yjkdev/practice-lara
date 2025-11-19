<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\Api\AuthController;

// 임시로 다른 리소스를 위한 더미 라우트 추가 (링크 생성을 위해)
Route::get('/users/{user}', function () {})->name('api.users.show');
Route::get('/comments/{comment}', function () {})->name('api.comments.show');

// Article 리소스 컨트롤러 라우트
Route::apiResource('articles', ArticleController::class)->names('api.articles');

// 미들웨어를 적용할 테스트 라우트
Route::get('/profile', function (Request $request) {
  return response()->json([
      'message' => 'Welcome to your profile!',
      'app_version' => $request->header('X-App-Version'),
  ]);
})->middleware('ensure.version:1.2.0'); // 별칭을 사용하여 미들웨어 적용

Route::post('/publishers', [PublisherController::class, 'store']);

// 6-2
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
}); */

// 6-3
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});