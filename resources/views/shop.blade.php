@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>店舗詳細</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">

                            <label for='name'>店舗名：{{ $posts->name }}</label>
                            <br>
                            <label for='adress'>住所：{{ $posts->adress }}</label>
                            <br>
                            <label for='review' class='mt-2'>レビュー点：</label>
                            <br>
                            <label for='comment' class='mt-2'>コメント：{{ $posts->comment }}</label>
                            <br>
                            <!--  写真-->
                            </div>
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection