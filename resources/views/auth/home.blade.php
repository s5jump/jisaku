@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>店舗情報　　

                            <a href="{{ route('shop.new') }}">
                <button type="submit" class="btn btn-primary">店舗新規登録</button></a>
                            </div>
                            
                        </div>
                        <div class="card-body">

                  <div class="card-body">
                  @foreach($shop as $shops)
                            <label for='name'>店舗名：{{ $shops['name'] }}</label>
                            <br>
                            <label for='adress'>住所：{{ $shops['adress'] }}</label>
                            <br>
                            <label for='review' class='mt-2'>平均レビュー点：</label>
                            <br>
                            <label for='adress'>店舗紹介・メニュー紹介：{{ $shops['comment'] }}</label>
                            <br>
                            <label for='image' class='mt-2'>店舗写真：{{ $shops['image'] }}</label>
                    @endforeach 
                            <br>
                            <label for='' class='mt-2'>ユーザーレビュー一覧</label>
                            </div>
                           
                            <div class='text-right'>
                                <a href="{{ route('edit.shop',['shop'=>$shops['id']]) }}">
                                    <button type="submit" class="btn btn-primary">編集</button></a>
                            
                            <a href="{{ route('shop.delete',['shop'=>$shops['id']]) }}">
                                <button type="submit" class="btn btn-primary">削除</button></a>
                                </div>
                                </div>
                
                              
                            
                            
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection