@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>レビュー新規投稿</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">

                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{ old('title')}}"/>

                            <label for='review' class='mt-2'>レビュー点</label>
                            <select name='review_id' class='form-control'>
                                
                                @foreach(Config::get('pulldown.review') as $key => $val)
                                <option value="{{ $key }}" >{{ $val }}</option>
                                @endforeach
                            </select>

                            <label for='comment' class='mt-2'>コメント</label>
                                <textarea class='form-control' name='comment'>{{ old('comment')}}</textarea>
                           
                            <label for="image" class='mt-2'>写真</label>
                                <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}"/>
                            
                            </div>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection