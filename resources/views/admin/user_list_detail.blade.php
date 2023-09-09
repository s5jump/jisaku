@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>ユーザー情報</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                            <label for='name'>ユーザー名：</label>
                                <br>
                            <label for='email' class='mt-2'>メールアドレス：</label>
                            <br>
                            <label for='' class='mt-2'>非表示件数: </label>
                               
                                <br>
                            <label for='date' class='mt-2'>登録日:</label>
                                
                            
                            </div>
                            
                            <div class="text-center">
                            <a href="">
                                    <button type="submit" >利用停止にする</button></a>
                        
                
                        </div>
                        
</div>
                    </div>
               
                
            </div>
        </main>
        @endsection