<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseDemoController extends Controller
{
    public function string()
    {
        return response('Hello, World!', Response::HTTP_OK, [
            'Content-Type' => 'text/plain',
        ]);
    }

    public function view()
    {
        return view('welcome', ['message' => '뷰에서 전달된 메시지입니다.']);
    }

    public function json()
    {
        $data = [
            'id' => 1,
            'name' => 'Gemini User',
            'email' => 'gemini@example.com'
        ];
        return response()->json($data);
    }

    public function download()
    {
        $filePath = storage_path('app/test.txt');
        $fileName = 'user-guide.txt';
        
        if (!file_exists($filePath)) {
            abort(404);
        }

        return response() ->download($filePath, $fileName);
    }

    public function redirect()
    {
        return redirect()->route('response-demo.redirect-target')
            ->with('status', '성공적으로 리디렉션되었습니다!');
    }

    public function redirectTarget(Request $request)
    {
        $status = session('status');
        return "리디렉션 도착! 메시지: " . ($status ?? '메시지 없음');
    }
}
