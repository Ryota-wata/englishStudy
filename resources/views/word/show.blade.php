@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="text-center">
        <h2>「 {{ $word->japanese_word }} 」の正答履歴</h2>
    </div><br>

        @foreach ($wordAnswers as $wordAnswer)
            <p>回答: {{ $wordAnswer->answer }}</p>
            <p>結果: {{ $wordAnswer->is_correct ? '正解' : '不正解' }}</p>
            <hr>
        @endforeach
    </div>

    <div class="container">
        <a href="{{ route('word.index') }}" class="btn btn-secondary">単語一覧へ戻る</a>
    </div>
@endsection
