@extends('layouts.layout')
@section('content')
        <main class="py-4">
        <div class="my-navbar-contorol">
 
            <div class='row justify-content-around mt-3'>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>投稿リスト確認</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                <thead>
                                        <tr>
                                            <th scope='col'>投稿ID</th>
                                           
                                            <th scope='col'>違反報告件数</th>
                                           
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                            <tr>
                            @foreach($comment as $comments)
                           
                            <th scope='col'　class='text-center'>
                            {{ $comments->id }}</a></th>
                          
                           
                            <th scope='col' class='text-center'>{{ $comments->post_count }}</th>
                            @endforeach
                            <th scope='col'>
                           
                                <a href="">
                                <button type="submit" >非表示にする</button>
                                    </a></th>
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