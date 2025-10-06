<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Events\UserRegistered;

class RegisterController extends Controller
{
    // 회원가입 폼 화면 보여주기
    public function create()
    {
        return view('regist.register');
    }

    // 회원가입 데이터 저장
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 사용자가 생성된 후 이벤트를 발생시킵니다. 
        event(new UserRegistered($user));

        return view('regist.complete', compact('user'));
    }
}
