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
                        

                       

                        <div>
                        

                        </div>
                    
                            <div class="card-body">
                            
                            <label for='name'>店舗名：{{ $bookmark->shop->name }}</label>
                            <br>
                            <label for='adress'>住所：{{ $bookmark->shop->adress }}</label>
                            <br>
                            @if($bookmark->shop->shopavg($bookmark->shop->id))
                                <th scope='col'>平均レビュー点：
                                {{ $bookmark->shop->shopavg($bookmark->shop->id)->count_review }} 
                                </th>
                             @else
                             <th scope='col'>平均レビュー点：---
                             </th>
                            @endif
                            <br>
                            <label for='comment' class='mt-2'>コメント：{{ $bookmark->shop->comment }}</label>
                            <br>
                            <label for='image' class='mt-2'>店舗写真：{{ $bookmark->shop->image }}</label>
                            
                            
                            <br>
                            
                            
                           
                            <th scope='col'>
                            </th>
                          
                           
                            <th scope='col'>

                            </th>
                           

                            
                            <th scope='col'></th>
                               
                            
                            </label>
                            </div>
                            
                         
                            
                            
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection
