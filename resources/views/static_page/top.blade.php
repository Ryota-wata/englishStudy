@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <img src="img/logo.jpg" class="card-img">
</div>
<div class="container">
    <div class="bg-body-tertiary p-5 mb-4 rounded text-center">
        <h1>英語クイズ作成アプリ</h1>
        <p class="lead">英語が話せるようになるには、話したい単語やフレーズを覚えることが大切です。<br>このアプリでは、覚えたい英単語や文を登録して、クイズ形式で覚えることができます。<br>瞬時に単語やフレーズが出てくるまで練習して英語脳を作りましょう！</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('register') }}" class="btn btn-success btn-lg px-4 gap-3">新規登録</a>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">ログイン</a>
        </div>
      </div>
      <!-- 列の例 -->
      <div class="row">
        <div class="col-lg-4">
          <h2 class="alert alert-info">覚えたい単語・フレーズを登録</h2>
            <p>覚えたい単語やフレーズの日本語訳と英訳を登録し、一覧で見ることができます。</p><br>
        </div>
        <div class="col-lg-4">
          <h2 class="alert alert-danger">Myクイズ</h2>
          <p>登録した単語やフレーズの中からランダムで問題が出題されます。現実の場面で選択肢が提供されることはありませんので、問題は選択肢無しで回答します。</p><br>
        </div>
        <div class="col-lg-4">
          <h2 class="alert alert-success">正答率確認</h2>
          <p>クイズの結果は正答率として表示されます。また、今までの回答履歴も一覧で表示します。</p>
        </div>
      </div>
    </div>
</div>
@endsection
 
@section('footer')
    <footer>
        <div class="text-center text-muted">© 2023 英語クイズ作成アプリ</div>
    </footer>
@endsection