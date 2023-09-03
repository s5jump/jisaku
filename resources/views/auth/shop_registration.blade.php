@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">

     
        <nav class="card mt-5">
        <div class="text-center">
        <h2>店舗管理者専用画面</h2>
          <div class="card-body">
           
            
       
              <div class="text-center">
                            <a href="{{ route('shop.new') }}">
                                <button type='submit' class='btn btn-primary '>店舗登録する</button></a>
                            
                                </div>
              </div>
             
              </div>   
      </div>
    </div>
  </div>
@endsection