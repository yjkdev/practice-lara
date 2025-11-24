<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    /**
     * 사용자를 깃허브 인증 페이지로 리다이렉션합니다.
     */
    public function redirect()
    {
        // '깃허브' 사용자 인증을 보냅니다.
        return Socialite::driver('github')->redirect();
    }

    /**
     * 깃허브에서 사용자 정보를 받아 처리합니다.
     */
    public function callback()
    {
        // '깃허브'에서 돌아온 사용자의 정보를 받습니다.
        $githubUser = Socialite::driver('github')->user();

        // DB에서 깃허브 ID를 기준으로 사용자를 찾거나, 없으면 새로 만듭니다.
        $user = User::updateOrCreate(
            ['github_id' => $githubUser->id],
            [
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]
        );

        // 해당 사용자를 로그인시킵니다.
        Auth::login($user);

        // 로그인 후 보여줄 페이지로 리다이렉션합니다.
        return redirect('dashboard');
    }
}