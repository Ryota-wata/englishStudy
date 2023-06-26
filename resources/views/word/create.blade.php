@extends('layouts.app')

@section('content')
<div class="bg-info bg-opacity-25">
    <div class="container">
        <div class="text-center"><br>
            <h1>新しい単語を追加</h1>
        </div><br>

        <a href="https://www.deepl.com/ja/translator" class="btn btn-warning" target="_blank">DeepLを使用する</a><br><br>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('word.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="japanese_word">日本語:</label>
                <input type="text" name="japanese_word" id="japanese_word" class="form-control" required>
            </div><br>
            <div class="form-group">
                <label for="english_word">英語:</label>
                <input type="text" name="english_word" id="english_word" class="form-control" required>
            </div><br>
            <button type="submit" class="btn btn-primary">登録</button><br><br>
            <a href="{{ route('word.index') }}" class="btn btn-secondary">戻る</a>
        </form>
    </div><br>
</div>
@endsection

@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection