@extends('layouts.layout')
@section('content')


        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>店舗情報　　

                            </div>
                            
                        </div>
                        <div class="card-body">

                  <div class="card-body">
                  @foreach($shops as $shop)
                            <label for='name'>店舗名：{{ $shop['name'] }}</label>
                            <br>
                            <label for='adress'>住所：{{ $shop['adress'] }}</label>
                            <br>
                            <label for='review' class='mt-2'>平均レビュー点：
                            @if($shop->shopavg($shop->id))
                                
                                {{ $shop->shopavg($shop->id)->count_review }} 
                               
                             @else
                             ---
                             
                            @endif
                            </label>
                            <br>
                            <label for='adress'>店舗紹介・メニュー紹介：{{ $shop['comment'] }}</label>
                            <br>
                            <label for='image' class='mt-2'>店舗写真：{{ $shop['image'] }}</label>
                    
                            <br>
                            <a href="{{ route('shop.home.review',['shop'=>$shop['id']]) }}">
                            <label for='' class='mt-2'>レビュー一覧</label></a>
                            </div>
                             
                            <div class='text-right'>
                                <a href="{{ route('edit.shop',['shop'=>$shop['id']]) }}">
                                    <button type="submit" class="btn btn-primary">編集</button></a>
                            
                            <a href="{{ route('shop.delete',['shop'=>$shop['id']]) }}">
                                <button type="submit" class="btn btn-primary">削除</button></a>
                                </div>
                                </div>
                                
                                @endforeach
                            
                            
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection