@extends('layouts.app')

@section('content')
<div class="center jumbotron"><br>
    <div class="alert alert-warning text-center">
      <h1>英語クイズ作成アプリ</h1>
    </div>
</div>

<div class="card mb-4">
    <img src="img/logo.jpg" class="card-img">
</div>

<div class="px-4 py-5 my-5 text-center">
    <h1 class="display-5 fw-bold text-body-emphasis">このアプリの目的</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">英語が話せるようになるには、言いたい単語やフレーズを覚えることが大切です。<br>このアプリでは、覚えたい英単語や文を登録して、クイズ形式で覚えることができます。<br>現実の場面で選択肢が提供されることはありません。<br>瞬時に単語やフレーズが出てくるまで練習して英語脳を作りましょう！</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 gap-3">新規登録</a>
            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg px-4">ログイン</a>
        </div>
    </div>
</div>

@endsection
 
@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection