<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>회원가입</title>
  <style>
    body { font-family: sans-serif; }
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; }
    input { width: 300px; padding: 8px; }
    .error { color: red; font-size: 0.9em; margin-top: 5px; }
    button { padding: 10px 15px; }
    .alert-danger { 
      padding: 15px; 
      background-color: #f8d7da; 
      color: #721c24; 
      border: 1px solid #f5c6cb; 
      border-radius: 5px; 
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <h1>회원가입</h1>

  {{-- 전체 에러 메시지를 상단에 표시 --}}
  @if ($errors->any())
    <div class="alert-danger">
      <strong>あっ！</strong> 何か問題があったようです。<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('validate.store') }}" method="POST">
    @csrf

    <div class="form-group">
      <label for="name">이름</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}">
      @error('name')
        <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="email">이메일</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}">
      @error('email')
        <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="password">비밀번호</label>
      <input type="password" id="password" name="password">
      @error('password')
        <div class="error">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="password_confirmation">비밀번호 확인</label>
      <input type="password" id="password_confirmation" name="password_confirmation">
    </div>

    <button type="submit">가입하기</button>
  </form>
</body>
</html>
