<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>
<p>작성자: {{ $post->user->name }}</p>

{{-- 현재 로그인한 사용자가 이 글($post)을 'update'할 수 있는지 확인 --}}
@can('update', $post)
    <a href="{{ route('posts.edit', $post) }}">수정하기</a>
@endcan

{{-- 현재 로그인한 사용자가 이 글($post)을 'delete'할 수 있는지 확인 --}}
@can('delete', $post)
    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">삭제하기</button>
    </form>
@endcan