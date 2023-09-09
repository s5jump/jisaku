@extends('layouts.layout')

@section('content')
<main>
<div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
<nav class="card mt-5">
          <div class="card-header">パスワード変更完了</div>
          <div class="card-body">
   
    <div>
        <p>パスワードの変更が完了しました</p>
        <p>新しいパスワードにて再ログインしてください</p>
    </div>
    <div>
      <a href="{{ route('login') }}">ログイン画面へ</a>
    </div>
    </div>
    </div>
    </div>
    </div>
</main>
@endsection