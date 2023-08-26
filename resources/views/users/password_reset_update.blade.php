@extends('layouts.layout')

@section('content')
<main>
    <h2>パスワード変更完了</h2>
    <div>
        <p>パスワードの変更が完了しました</p>
        <p>新しいパスワードにて再ログインしてください</p>
    </div>
    <div>
      <a href="{{ route('login') }}">ログイン画面へ</a>
    </div>
</main>
@endsection