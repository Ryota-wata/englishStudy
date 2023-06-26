@extends('layouts.app')

@section('content')
<div class="bg-success bg-opacity-10">
    <div class="container">
    <div class="text-center"><br>
        <h2>「 {{ $word->japanese_word }} 」の正答履歴</h2>
    </div><br>

        @foreach ($wordAnswers as $wordAnswer)
            <p>{{ $loop->iteration }}回目</p>
            <p>回答: {{ $wordAnswer->answer }}</p>
            <p>結果: {{ $wordAnswer->is_correct ? '正解' : '不正解' }}</p>
            <hr>
        @endforeach
    </div>

    <div class="container">
        <a href="{{ route('word.index') }}" class="btn btn-secondary">英単語一覧へ戻る</a>
    </div><br>
</div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection
