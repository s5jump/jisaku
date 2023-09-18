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
                                            <th scope='col'>平均レビュー点</th>
                                            
                                            <th scope='col'></th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                            @foreach($bookmark as $bookmarks)
                            <tr>
                            <th scope='col'>
                            {{ $bookmarks->name }}</th>
                            <th scope='col'>
                            {{ $bookmarks->adress }}</th>
                            <th scope='col'>
                            {{ $bookmarks->image }}</th>
                            
                                <th scope='col'>
                                
                                </th>
                             
                            
                            <th scope='col'>
                               </th>
                           
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