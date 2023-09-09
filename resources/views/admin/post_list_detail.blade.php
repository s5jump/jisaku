@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>投稿詳細</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                           @foreach($posts as $post)
                            <label for='title'>タイトル：{{ $post->title }}</label>
                                <br>
                            <label for='review' class='mt-2'>レビュー点：{{ $post->review }}</label>
                            <br>
                            <label for='comment' class='mt-2'>コメント: {{ $post->comment }}</label>
                               
                                <br>
                            <label for='image' class='mt-2'>写真:{{ $post->image }}</label>
                            @endforeach
                           
                            </div>
                          
                        
</div>
                    </div>
               
                
            </div>
        </main>
        @endsection