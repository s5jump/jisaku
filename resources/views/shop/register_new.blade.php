@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">店舗新規登録</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('shop.new') }}" method="POST">
              @csrf
            
              <div class="form-group">
                <label for="name">店名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"/>
              </div>
              <div class="form-group">
                <label for="adress">住所</label>
                <input type="text" class="form-control" id="adress" name="adress" value="{{ old('adress') }}"/>
              </div>
              <div class="form-group">
                <label for="comment">店舗紹介・メニュー紹介</label>
                <input type="text" class="form-control" id="comment" name="comment" value="{{ old('comment') }}"/>
              </div>
              <div class="form-group">
                <label for="image">店舗写真</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}"/>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">登録</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection