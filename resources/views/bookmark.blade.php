@extends('layouts.layout')
@section('content')
        <main class="py-4">
        <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">

                   

                    
                        <div class="card-header">
                            <div class='text-center'>ブックマーク一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                
                               

                                <table class='table'>
                                <thead>
                                   
                                        <tr>
                                            <th scope='col'>店名</th>
                                            <th scope='col'>住所</th>
                                            <th scope='col'>店舗写真</th>
                                            <th scope='col'></th>
                                            
                                            <th scope='col'></th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                            @foreach($bookmark as $bookmarks)
                            <tr>
                            <th scope='col'>
                            {{ $bookmarks->shop->name }}</th>
                            <th scope='col'>
                            {{ $bookmarks->shop->adress }}</th>
                            <th scope='col'>
                                
                            {{ $bookmarks->shop->image }}</th>
                            
                                <th scope='col'>
                                
                                </th>
                                <th scope='col'>
                                <a href="{{ route('bookmark.detail',['bookmark'=>$bookmarks['id']]) }}">詳細</a></th>
                           
                            </tr>


                                @endforeach
                            
                           
                            
                           
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