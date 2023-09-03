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
                            <label for='title'>タイトル：{{ $posts->title }}</label>
                                <br>
                            <label for='review' class='mt-2'>レビュー点：{{ $posts->review }}</label>
                            <br>
                            <label for='comment' class='mt-2'>コメント: {{ $posts->comment }}</label>
                               
                                <br>
                            <label for='image' class='mt-2'>写真:{{ $posts->image }}</label>
                                
                            
                            </div>
                            <div class="text-right">
                            @if(Auth::check())
                           
                            <a href="{{ route('breach') }}">
                                    <button type="submit" class="btn btn-primary">違反報告</button></a>
                            @endif
                            @if(Auth::id())
                                <a href="{{ route('edit.post',['post'=>$posts['id']]) }}">
                                    <button type="submit" class="btn btn-primary">編集</button></a>
                            @endif    
                
                        </div>
                        
</div>
                    </div>
               
                
            </div>
        </main>
        @endsection