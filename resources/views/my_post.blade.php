@extends('layouts.layout')
@section('content')
        <main class="py-4">
        
        <div class="my-navbar-contorol">
        <div class="row justify-content-around">
        
        <form action="{{ route('my.post') }}" method="post">
        @csrf
</div>
            <div class='row justify-content-around mt-3'>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>自分の投稿</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            <th scope='col'>レビュー点</th>
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            @foreach($posts as $post)
                            <tr>
                            <th scope='col'>
                                {{ $post['title'] }}</th>
                           
                            <th scope='col'>
                                {{ $post['review'] }}</th>

                                
                            <th scope='col'>
                            <a href="{{ route('post.detail',['post'=>$post['id']]) }}">詳細</a></th>
                           
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            </div>
                        </div>

</form>
                    </div>
                </div>
              
</div>
                
            </div>
        </main>
        @endsection