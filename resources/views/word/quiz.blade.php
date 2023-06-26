@extends('layouts.app')

@section('content')
<div class="bg-danger bg-opacity-25">
    <div class="container">
        <div class="text-center"><br>
            <h1>英単語クイズ</h1><br><br>
        </div>

        @if ($words)
            @foreach ($words as $word)
                <h4>次の日本語を英訳してください。</h4><br>
                <h5>「 {{ $word }} 」</h3><br>

                <form action="{{ route('word.check') }}" method="POST">
                    @csrf
                    <input type="hidden" name="japanese_word" value="{{ $word }}">
                    <div class="form-group">
                        <label for="answer">回答：</label>
                        <input type="text" name="answer" id="answer" class="form-control" required>
                    </div><br>
                    <button type="submit" class="btn btn-primary">回答する</button><br><br>
                    <a href="{{ route('word.index') }}" class="btn btn-secondary">戻る</a>
                </form>
            @endforeach
        @else
            <p>クイズの準備ができていません。</p>
        @endif
    </div><br>
</div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection