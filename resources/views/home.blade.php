@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>投稿</div>
                        </div>
                        <div class="card-body">
                            <!-- 写真表示する -->
                            <div class="card-body">
                            @foreach($posts as $post)
                                <p><a href="{{ route('post.detail',['post'=>$post['id']]) }}">詳細</a></p>
                            @endforeach 
                            @foreach($shops as $shop)
                                <p><a href="{{ route('shop.detail',['shop'=>$shop['id']]) }}">{{ $shop['name'] }}</a></p> 
                            @endforeach 
                                <!--  ユーザー名 -->
                            @foreach($posts as $post)
                                <p>{{ $post['review'] }}</p> 
                            @endforeach
                                    
                             
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
        @endsection