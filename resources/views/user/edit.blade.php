@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
          <h1>ユーザー情報編集</h1>
        </div><br><br>
        <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">名前:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div><br>
            <div class="form-group">
                <label for="email">メールアドレス:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div><br>
            <div class="form-group">
                <label for="password">新しいパスワード:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="password_confirmation">新しいパスワード（確認）:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div><br>
            <button type="submit" class="btn btn-primary">更新</button>
        </form><br>
        <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('user.show', Auth::user()->id) }}'">戻る</button>
    </div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection