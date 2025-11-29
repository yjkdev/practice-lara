<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function update(Request $request, Post $post)
    {
        // 1. 이 사용자가 이 글($post)을 'update' 할 권한이 있는지 확인해
        // (PostPolicy의 update 메소드가 실행됨)
        // 2. 권한이 없으면, Laravel이 알아서 403 에러 페이지 표시
        $this->authorize('update', $post);

        // 3. 권한이 있다면 아래 코드 실행
        $post->update($request->all());

        return redirect()->route('posts.show', $post);
    }
}
