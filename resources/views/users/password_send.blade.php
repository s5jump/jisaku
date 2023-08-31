@extends('layouts.layout')

@section('content')
<main>


    <h2>メール送信完了</h2>
    <div>
        <p>パスワード再設定用のメールを送信しました</p>
        <p>メールに記載されているリンクからパスワードの再設定を行ってください</p>
    </div>
    <div>
      <a href="{{ route('login') }}">ログイン画面へ</a>
    </div>
    
</main>
@endsection