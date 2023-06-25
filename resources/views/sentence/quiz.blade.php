@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>英文クイズ</h1><br><br>
        </div>

        @if ($sentences)
            @foreach ($sentences as $sentence)
                <h4>次の日本語を英訳してください。</h4><br>
                <h5>「 {{ $sentence }} 」</h3><br>

                <form action="{{ route('sentence.check') }}" method="POST">
                    @csrf
                    <input type="hidden" name="japanese_sentence" value="{{ $sentence }}">
                    <div class="form-group">
                        <label for="answer">回答：</label>
                        <input type="text" name="answer" id="answer" class="form-control" required>
                    </div><br>
                    <button type="submit" class="btn btn-primary">回答する</button><br><br>
                    <a href="{{ route('sentence.index') }}" class="btn btn-secondary">戻る</a>
                </form>
            @endforeach
        @else
            <p>クイズの準備ができていません。</p>
        @endif
    </div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection