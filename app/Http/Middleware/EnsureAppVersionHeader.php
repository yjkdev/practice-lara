<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAppVersionHeader
{
    public function handle(Request $request, Closure $next, string $minimumVersion = '1.0.0'): Response
    {
        // --- 전처리 로직 ---
        // 요청 헤더에 'X-App-Version'이 있는지 확인
        if (!$request->hasHeader('X-App-Version')) {
            // 헤더가 없으면 400 에러와 함께 JSON 응답을 반환
            return response()->json(['error' => 'X-App-Version header is required.'], 400);
        }

        // 버전 비교 (version_compare 함수 사용)
        if (version_compare($request->header('X-App-Version'), $minimumVersion, '<')) {
            return response()->json([
                'error' => "App version must be at least {$minimumVersion}."
            ], 400);
        }

        // 다음 미들웨어 또는 컨트롤러로 요청을 전달
        $response = $next($request);

        // --- 후처리 로직 ---
        // 응답에 커스텀 헤더를 추가
        $response->header('X-Processed-By', 'Gemini-Middleware');

        // 최종 응답을 반환
        return $response;
    }
}
