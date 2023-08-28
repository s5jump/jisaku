@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
        <h2>管理者画面を管理する</h2>
          <div class="card-body">
           
            <form action="{{ url('admin/logout') }}" method="POST">
              @csrf
              <input type="submit" value="ログアウト" />
            </form>
      </div>
    </div>
  </div>
@endsection