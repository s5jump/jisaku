@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>レビュー投稿編集</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                            <div class='panel-body'>
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                                
                        <form action="{{ route('edit.post',['post'=>$posts['id']]) }}" method="post" >
                            @csrf
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{ old('title',$posts->title)}}"/>

                            <label for='review' class='mt-2'>レビュー点</label>
                            <select name='review' class='form-control'>
                           
                                @foreach(Config::get('pulldown.review') as $key => $val)
                                <option value="" hidden>{{ old('review',$posts->review) }}</option>
                                <option value="{{ $key }}" >{{ $val }}</option>
                                @endforeach
                            </select>

                            <label for='comment' class='mt-2'>コメント</label>
                                <textarea class='form-control' name='comment'>{{ old('comment',$posts->comment)}}</textarea>
                           
                            <label for="image" class='mt-2'>写真</label>
                                <input type="file" class="form-control" id="image" name="image" value="{{ old('image',$posts->image) }}"/>
                            
                                </div>
                           
                           
                        </div>
                       
                        <div class="text-right">
                            <a href="{{ route('edit.post',['post'=>$posts['id']]) }}">
                                <button type='submit' class='btn btn-primary '>更新</button></a>
                                </form>
                            <a href="{{ route('post.delete',['post'=>$posts['id']]) }}">
                                <button type="submit" class="btn btn-primary">削除</button></a>
                                </div>
                                
                    </div>
                    </div>
                </div>
                
            </div>
        </main>
        @endsection