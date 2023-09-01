@extends('layouts.layout')
@section('content')
        <main class="py-4">
        
       
        
      

        
        <div class="row justify-content-around">
            <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>検索</div>
                                <div class="card-body">
                                <form class="form-inline my-2 my-lg-0 ml-2">
                                @csrf
                                    <div class="form-group">
                                    
                                    <input type="search" class="form-control mr-sm-2" name="keyword"  value="{{ $keyword }}" placeholder="タイトル　内容　地域" aria-label="検索...">
                                  
                                    <select class='form-control mr-sm-2'  name='review' value="{{ $review }}">
                                        <option value='' hidden>点</option> 
                                        @foreach(Config::get('pulldown.review') as $key => $val)
                                        <option value="{{ $key }}" >{{ $val }}</option>
                                        @endforeach
                                    </select>

                                   
                                    
                                    <input type="submit" value="検索" class="btn btn-info">
                                </form>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            
        
       
        <div class="my-navbar-contorol">
        <div class="row justify-content-around">
        <div class="col-md-4">
        </div>
      
        
        @if(Auth::check())
        <div class="card-header">
            <h1><span class="my-navbar-item">{{ optional(Auth::user())->name }}</span>
        </h1>
        @can ('shopAdmin')
        <p> <a href="{{ route('shop.home') }}">店舗情報</a></p>
        @endcan
            <p> <a href="{{ route('my.post') }}">自分の投稿</a>　　　　　　　　　　　
            <a href="{{ route('profile') }}">プロフィール編集</a></p>
            </div>
            @endif
        </div>
        </div>
        </div>
        </div> 
        </div>
        </div>


            <div class="row justify-content-around">
            <a href="{{ route('shop.information') }}">
                <button type='button' class='btn btn-warning'>店舗情報</button>
            </a>

            @if(Auth::check())
            
            <a href="">
                <button type='button' class='btn btn-success'>ブックマーク</button>
            </a>

            
            <a href="{{ route('create.post') }}">
                <button type='button' class='btn btn-primary'>投稿する</button>
            </a>
            @endif

</div>
            <div class='row justify-content-around mt-3'>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>投稿一覧</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                <thead>
                                        <tr>
                                            <th scope='col'>タイトル</th>
                                            @if(Auth::check())
                                            <th scope='col'>ユーザー名</th>
                                            @endif
                                            <th scope='col'>レビュー点</th>
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            @foreach($posts as $post)
                            <tr>
                            <th scope='col'>
                                {{ $post['title'] }}</th>
                              
                                @if(Auth::id())
                            <th scope='col'>
                                {{ optional(Auth::user())->name }}
                            </th>
                            @endif
                           
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

                   
                    </div>
                </div>
              
</div>
                
            </div>
        </main>
        @endsection