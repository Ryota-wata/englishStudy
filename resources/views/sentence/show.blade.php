@extends('layouts.app')

@section('content')
<div class="bg-success bg-opacity-10">
    <div class="container"><br>
    <div class="text-center">
        <h2>「 {{ $sentence->japanese_sentence }} 」の正答履歴</h2>
    </div><br>

        @foreach ($sentenceAnswers as $sentenceAnswer)
            <p>{{ $loop->iteration }}回目</p>
            <p>回答: {{ $sentenceAnswer->answer }}</p>
            <p>結果: {{ $sentenceAnswer->is_correct ? '正解' : '不正解' }}</p>
            <hr>
        @endforeach
    </div>

    <div class="container">
        <a href="{{ route('sentence.index') }}" class="btn btn-secondary">英文一覧へ戻る</a>
    </div><br>
</div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection
