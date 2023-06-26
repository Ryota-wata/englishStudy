@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
          <h1>ユーザー情報</h1>
        </div><br><br>
        <table class="table mt-3">
            <tr>
                <th>名前</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{ $user->email }}</td>
            </tr>
        </table><br>
        
        <p><a href="{{ route('user.edit', Auth::user()->id) }}" class="btn btn-success">編集</a></p>
        <form action="{{ route('user.destroy', Auth::user()->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">退会</button>
        </form><br>
        <p><a href="{{ route('word.index') }}" class="btn btn-secondary">My単語一覧へ戻る</a></p>

    </div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection