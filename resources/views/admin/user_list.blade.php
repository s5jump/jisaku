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
                                           
                                            <th scope='col'>非表示件数</th>
                                           
                                            <th scope='col'></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                            <tr>
                
                            <th scope='col'>
                                
                            </th>
                          
                           
                            <th scope='col'>
                                </th>
                            <th scope='col'>
                                <a href="{{ route('admin.user.list.detail') }}">詳細</a></th>
                            
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