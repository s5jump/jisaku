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
                            @foreach($shops as $shop)
                            <label for='name'>店舗名：{{ $shop->name }}</label>
                            <br>
                            <label for='adress'>住所：{{ $shop->adress }}</label>
                            <br>
                            <label for='review' class='mt-2'>レビュー点：</label>
                            <br>
                            <label for='comment' class='mt-2'>コメント：{{ $shop->comment }}</label>
                            <br>
                            <label for='image' class='mt-2'>店舗写真：{{ $shop->image }}</label>
                            @endforeach
                            <br>
                            <label for='image' class='mt-2'>ユーザーレビュー一覧</label>
                            </div>
                            
                              
                            
                            
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection