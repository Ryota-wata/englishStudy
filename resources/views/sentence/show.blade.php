@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="text-center">
        <h2>「 {{ $sentence->japanese_sentence }} 」の正答履歴</h2>
    </div><br>

        @foreach ($sentenceAnswers as $sentenceAnswer)
            <p>回答: {{ $sentenceAnswer->answer }}</p>
            <p>結果: {{ $sentenceAnswer->is_correct ? '正解' : '不正解' }}</p>
            <hr>
        @endforeach
    </div>

    <div class="container">
        <a href="{{ route('sentence.index') }}" class="btn btn-secondary">単語一覧へ戻る</a>
    </div>
@endsection
