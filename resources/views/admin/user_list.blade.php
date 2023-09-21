@extends('layouts.layout')
@section('content')
        <main class="py-4">
        <div class="my-navbar-contorol">
 
            <div class='row justify-content-around mt-3'>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>ユーザーリスト確認</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                <thead>
                                        <tr>
                                            
                                            <th scope='col'>ユーザー名</th>
                                            <th scope='col'>メールアドレス</th>
                                            <th scope='col'>非表示件数</th>
                                            <th scope='col'>権限</th>
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                            <tr>
                            @foreach($posts as $post)
                            
                            <th scope='col' class='text-center'>
                           {{ $post->user->name }}
                            </th>
                            <th scope='col' class='text-center'>
                           {{ $post->user->email }}
                            </th>
                           
                            <th scope='col' class='text-center'>
                                {{ $count }}
                                </th>

                                        <th scope='col' class='text-center'>
                                        @if($post->user->role == 0)
                                            一般
                                        @elseif($post->user->role == 1)
                                            管理者
                                        @else
                                            店舗管理者
                                        @endif
                                        </th>
                                        <th scope='col'>
                                
                            
                            <a href="{{ route('admin.user.list.delete',['id'=>$post->id]) }}" >
                            
                                    <button type="submit" >利用停止する</button></a></th>
                            
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