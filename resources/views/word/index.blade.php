@extends('layouts.app')

@section('content')
    <div class="center jumbotron"><br>
        <div class="text-center">
            <h1>My英単語一覧</h1>
        </div>
    </div><br><br>
    <div class="container">

        <a href="{{ route('word.create') }}" class="btn btn-primary">覚えたい単語を登録</a>　
        <a href="/word/quiz" class="btn btn-warning">問題を解く</a><br><br>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <form action="{{ route('word.index') }}" method="GET" class="form-inline">
                <div class="form-group">
                    <input type="text" name="search" value="{{ $keywords }}" class="form-control" placeholder="日本語 or 英語を入力">
                </div>
                <input type="submit" value="検索" class="btn btn-info">
            </form>
        </div><br>

        <div class="card">
        <table class="table table-hover mt-3 mb-0">
            <thead>
                <tr>
                    <th>日本語</th>
                    <th>英語</th>
                    <th>正答率</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($words as $word)
                    <tr>
                        <td>{{ $word->japanese_word }}</td>
                        <td>{{ $word->english_word }}</td>
                        <td>
                            @if ($word->wordAnswers->count() > 0)
                                {{ round(($word->wordAnswers->where('is_correct', true)->count() / $word->wordAnswers->count()) * 100) }}%
                            @else
                                0%
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('word.edit', $word->id) }}" class="btn btn-success">編集</a>
                            <form action="{{ route('word.destroy', $word->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('削除してもよろしいですか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection
