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

                            <label for='name'>店舗名</label>
                                <p>{{ $shops->name }}</p>
                            <label for='adress'>住所</label>
                                <p>{{ $shops->adress }}</p>
                            <label for='review' class='mt-2'>レビュー点</label>
                                <p>{{ $shops->review }}</p>
                            <label for='comment' class='mt-2'>コメント</label>
                                <p>{{ $shops->comment }}</p>
                            <!--  写真-->
                            </div>
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection