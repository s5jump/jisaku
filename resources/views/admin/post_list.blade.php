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
                                            <th scope='col'>ユーザーID</th>
                                            <th scope='col'>投稿ID</th>

                                            <th scope='col'>投稿ユーザー</th>
                                          
                                            <th scope='col'>違反報告件数</th>
                                         
                                            
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                        @foreach($comment as $comments)
                           
                                            <th scope='col' class='text-center'>
                                            {{ $comments->user->id }}</th>

                                            <th scope='col' class='text-center'>
                                            {{ $comments->post_id }}</a></th>

                                            <th scope='col' class='text-center'>
                                            {{ $comments->user->name }}</a></th>
                                        
                                        
                                            <th scope='col' class='text-center'>
                                                {{ $comments->comment_count }}</th>
                                            
                                            <th scope='col'>
                                        
                                                <a href="{{ route('admin.post.list.delete',['id'=>$comments->id]) }}" >
                                                <button type="submit" >非表示</button></a>
                                                
                                            </th>
                                        
                                        </tr>
                            
                                    </tbody>
                                    @endforeach
                                </table>
                                
                            </div>
                        </div>

                   
                    </div>
                </div>
              
</div>
                
            </div>
        </main>
        @endsection