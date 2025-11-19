<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        // login 메소드를 제외한 모드 메소드에 auth:api 미들웨어 적용
    }

    public function login(Request $request)
    {
        // 로그인하고 JWT 토큰 반환
        $credentials = $request->only('email', 'password');

        if (! $token = Auth::guard('api')->attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        // 현재 로그인된 사용자 정보 가져옴
        return response()->json(Auth::guard('api')->user());
    }

    public function logout()
    {
        // 로그아웃 -> 토큰 무효화
        Auth::guard('api')->logout();

        return response()->json(['message'=> 'Successfully logged out']);
    }   

    public function refresh()
    {
        // 토큰 갱신
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    protected function respondWithToken($token)
    {
        // 토큰 응답 형식
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
