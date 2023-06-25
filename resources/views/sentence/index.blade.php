@extends('layouts.app')

@section('content')
    <div class="center jumbotron"><br>
        <div class="text-center">
            <h1>My英文一覧</h1>
        </div>
    </div><br><br>
    <div class="container">

        <a href="{{ route('sentence.create') }}" class="btn btn-primary">覚えたい英文を登録</a>　<a href="/sentence/quiz" class="btn btn-warning">問題を解く</a><br><br>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>日本語</th>
                    <th>英語</th>
                    <th>正答率</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sentences as $sentence)
                    <tr>
                        <td>{{ $sentence->japanese_sentence }}</td>
                        <td>{{ $sentence->english_sentence }}</td>
                        <td>
                            @if ($sentence->sentenceAnswers->count() > 0)
                                {{ round(($sentence->sentenceAnswers->where('is_correct', true)->count() / $sentence->sentenceAnswers->count()) * 100) }}%
                            @else
                                0%
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('sentence.edit', $sentence->id) }}" class="btn btn-success">編集</a>
                            <form action="{{ route('sentence.destroy', $sentence->id) }}" method="POST" class="d-inline">
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
@endsection

# PHP-FPM FastCGI server
# network or unix domain socket configuration

upstream php-fpm {
    server unix:/run/php-fpm/www.sock;
}