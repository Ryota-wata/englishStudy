@extends('layouts.app')

@section('content')
<div class="bg-info bg-opacity-25">
    <div class="container"><br>
      <div class="text-center">
        <h1>文章を編集</h1>
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

      <form action="{{ route('sentence.update', $sentence->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="japanese_sentence">日本語:</label>
                <input type="text" name="japanese_sentence" id="japanese_sentence" class="form-control" value="{{ $sentence->japanese_sentence }}" required>
            </div><br>
            <div class="form-group">
                <label for="english_sentence">英語:</label>
                <input type="text" name="english_sentence" id="english_sentence" class="form-control" value="{{ $sentence->english_sentence }}" required>
            </div><br>
            <button type="submit" class="btn btn-primary">更新</button><br><br>
            <a href="{{ route('sentence.index') }}" class="btn btn-secondary">戻る</a>
        </form>
    </div><br>
</div>
@endsection
        
@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection        
