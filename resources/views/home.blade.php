@extends('layouts.layout')
@section('content')
        <main class="py-4">
        
        <div class="my-navbar-contorol">
        <div class="row justify-content-around">
        <div class="col-md-4">
        @if(Auth::check())
        <div class="card-header">
            <h1><span class="my-navbar-item">{{ Auth::user()->name }}</span></h1>
            <p><a href="{{ route('profile') }}">プロフィール編集</a></p>
            </div>
            @endif
        </div>
        </div>
        
        </div>


            <div class="row justify-content-around">
            <a href="{{ route('shop.information') }}">
                <button type='button' class='btn btn-warning'>店舗情報</button>
            </a>


            <a href="{{ route('create.post') }}">
                <button type='button' class='btn btn-primary'>投稿する</button>
            </a>
</div>
            <div class='row justify-content-around mt-3'>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>投稿一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>ユーザー名</th>
                                            <th scope='col'>レビュー点</th>
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            @foreach($posts as $post)
                            <tr>
                            <th scope='col'>
                                {{ $post['title'] }}</th>
                            <th scope='col'>
                                <!-- ユーザー名 -->
                            </th>
                            <th scope='col'>
                                {{ $post['review'] }}</th>
                            <th scope='col'>
                                <a href="{{ route('post.detail',['post'=>$post['id']]) }}">詳細</a></th>
                           
                            </tr>
                            @endforeach 
                            </tbody>
                            </table>
                            </div>
                        </div>

                   
                    </div>
                </div>
              
</div>
                
            </div>
        </main>
        @endsection