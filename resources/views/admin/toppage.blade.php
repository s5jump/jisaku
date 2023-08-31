@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">

     
        <nav class="card mt-5">
        <div class="text-center">
        <h2>管理者専用画面</h2>
          <div class="card-body">
           
            <form action="{{ url('admin/logout') }}" method="POST">
              @csrf
              <div class="text-right">
              <input type="submit" value="ログアウト" />
              </div>
            </form>

              <div class="text-center">
                            <a href="{{ route('admin.user.list') }}">
                                <button type='submit' class='btn btn-primary '>ユーザーリスト</button></a>
                                <br>
                                <br>
                            <a href="{{ route('admin.post.list') }}">
                                <button type="submit" class="btn btn-primary">投稿リスト</button></a>
                                </div>
              </div>
                               
              </div>   
      </div>
    </div>
  </div>
@endsection