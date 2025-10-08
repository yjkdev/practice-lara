<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Request Test</h1>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('request.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label for="name">이름:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </p>
        <p>
            <label for="email">이메일:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </p>
        <p>
            <label for="password">비밀번호:</label>
            <input type="password" id="password" name="password">
        </p>
        <p>
            <label for="profile_picture">프로필 사진:</label>
            <input type="file" id="profile_picture" name="profile_picture">
        </p>
        <button type="submit">제출</button>
    </form>
</body>
</html>