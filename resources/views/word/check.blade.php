@extends('layouts.app')

@section('content')
    <div class="container">
      @if ($isCorrect)
        <h3 class="alert alert-primary text-center">正解です！！！</h3>
      @else
        <h3 class="alert alert-danger text-center">不正解です。。。</h3>
      @endif<br>

      <h4>問題：{{ $japaneseWord }}</h4><br>
      <h4>回答：{{ $answer }}</h4><br>
      <h4>正解：{{ $correctAnswer }}</h4><br>

      <a href="{{ route('word.quiz') }}" class="btn btn-primary">次の問題へ進む</a><br><br>
      <a href="{{ route('word.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection