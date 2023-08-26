@extends('layouts.layout')

@section('content')
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

            <form action="{{ route('password') }}" method="POST">
              @csrf
             
              <div class="form-group">
              
              <p>ご利用中のメールアドレスを入力してください</p>
              <p>パスワード再設定のためのURLをお送りします</p>
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              
                </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">再設定メールを送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection