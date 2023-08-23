@extends('layouts.layout')
@section('content')
        <main class="py-4">
        <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">

                   

                    
                        <div class="card-header">
                            <div class='text-center'>店舗一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                <thead>
                                   
                                        <tr>
                                            <th scope='col'>店名</th>
                                            <th scope='col'>住所</th>
                                            <th scope='col'>平均レビュー点</th>
                                            <th scope='col'>店舗写真</th>
                                            <th scope='col'></th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                            @foreach($shops as $shop)
                            <tr>
                            <th scope='col'>
                            {{ $shop->name }}</th>
                            <th scope='col'>
                            {{ $shop->adress }}</th>
                           

                            <th scope='col'>
                             </th>

                           
                            <th scope='col'>
                            {{ $shop->image }}</th>
                          
                            @endforeach
                            <th scope='col'>
                                <a href="{{ route('shop.detail') }}">詳細</a></th>
                           
                            </tr>
                           
                            
                           
                            </tbody>
                            </table>
                            </div>
                        </div>

                    
                    </div>
                </div>
              
</div>
                
            </div>
        </main>
        @endsection