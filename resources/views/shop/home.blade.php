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
                            
                            <label for='name'>店舗名：</label>
                            <br>
                            <label for='adress'>住所：</label>
                            <br>
                            <label for='review' class='mt-2'>平均レビュー点：</label>
                            <br>
                            <label for='image' class='mt-2'>店舗写真：</label>
                          
                            <br>
                            <label for='' class='mt-2'>ユーザーレビュー一覧</label>
                            </div>
                            
                              
                            
                            
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection