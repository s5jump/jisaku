@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>店舗編集</div>
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
                                
                        <form action="{{ route('edit.shop',['shop'=>$shop['id']]) }}" method="post">
                            @csrf
                            <label for='name'>店舗名</label>
                                <input type='text' class='form-control' name='name' value="{{ old('name',$shop->name)}}"/>
                            <label for='adress'>店舗名</label>
                                <input type='text' class='form-control' name='adress' value="{{ old('adress',$shop->adress)}}"/>
                            <label for='review' class='mt-2'>平均レビュー点</label>
                            

                            <label for='comment' class='mt-2'>店舗紹介・メニュー紹介</label>
                                <textarea class='form-control' name='comment'>{{ old('comment',$shop->comment)}}</textarea>
                           
                            <label for="image" class='mt-2'>写真</label>
                                <input type="file" class="form-control" id="image" name="image" value="{{ old('image',$shop->image) }}"/>
                            
                                </div>
                           
                              
                        </div>
                        </form>
                        <div class="text-right">
                            <a href="{{ route('edit.shop',['shop'=>$shop['id']]) }}">
                                <button type='submit' class='btn btn-primary '>更新</button></a>

                            <a href="{{ route('shop.delete',['shop'=>$shop['id']]) }}">
                                <button type="submit" class="btn btn-primary">削除</button></a>
                                </div>
                               
                    </div>
                    </div>
                </div>
                
            </div>
        </main>
        @endsection