@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>投稿リスト詳細</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                            <label for='name'>ユーザー名：</label>
                                <br>
                            <label for='review' class='mt-2'>レビュー点：</label>
                            <br>
                            <label for='' class='mt-2'>違反報告件数: </label>
                               
                             
                                
                            
                            </div>
                            
                            <div class="text-center">
                            <a href="">
                                    <button type="submit" class="btn btn-primary">非表示にする</button></a>
                        
                
                        </div>
                        
</div>
                    </div>
               
                
            </div>
        </main>
        @endsection