<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>등록 완료</title>
</head>
<body>
  <h2>{{ $user->name }}님을 등록했습니다.</h2>
  <a href="{{ route('home') }}" class="button">홈으로 이동</a>
</body>
</html>