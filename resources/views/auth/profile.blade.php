@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">プロフィール編集</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('profile') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" />
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password"   />
              </div>
              <div class="form-group">
                <label for="image">アイコン写真</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ Auth::user()->image }}" />
              </div>
           
             <div class="text-right">
              <a href="{{ route('profile.edit') }}">
                <button type="submit" class="btn btn-primary">更新</button></a>
                
              
            <a href="{{ route('profile.delete',['post'=>Auth::user()->id ]) }}">
                <button type="submit" class="btn btn-primary">削除</button></a>
          </div>
          </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection