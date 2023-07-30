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

                            <label for='title'>タイトル</label>
                                <p>{{ $posts->title }}</p>
                            <label for='review' class='mt-2'>レビュー点</label>
                                <p>{{ $posts->review }}</p>
                            <label for='comment' class='mt-2'>コメント</label>
                                <p>{{ $posts->comment }}</p>
                            <!--  写真-->
                            </div>
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection