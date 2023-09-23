@extends('layouts.layout')
@section('content')
        <main class="py-4">
        <div class="my-navbar-contorol">
 
            <div class='row justify-content-around mt-3'>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>レビュー一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                <thead>
                                        <tr>
                                            
                                            <th scope='col'>ユーザー名</th>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>レビュー点</th>
                                            <th scope='col'>コメント</th>
                                            <th scope='col'>写真</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                            <tr>
                           
                            @foreach($post as $posts)
                            <th scope='col' class='text-center'>
                                {{ $posts->user->name }}
                            </th>
                            <th scope='col' class='text-center'>
                                {{ $posts->title }}
                            </th>
                            
                            <th scope='col' class='text-center'>
                                {{ $posts->review }}
                            </th>

                            <th scope='col' class='text-center'>
                                {{ $posts->comment }}
                            </th>
                            <th scope='col'>
                                {{ $posts->image }}
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