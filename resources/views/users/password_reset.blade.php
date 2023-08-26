@extends('layouts.layout')

@section('content')
<main>
<div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">パスワード再設定</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
    <form method="POST" action="{{ route('password.reset.update') }}">
        @csrf
        <input type="hidden" name="reset_token" value="{{ $userToken->rest_password_access_key }}">
        <div>
            <label>新パスワード</label>
            <input type="password" name="password" value="">
            
        </div>
        <div>
            <label>新パスワード<span>確認</span></label>
            <input type="password" name="password_confirmation" value="">
        </div>
       
        <div class="text-right">
            <button type="submit">パスワードを再設定する</button>
        </div>
    </form>
</main>
@endsection



