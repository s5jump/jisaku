@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">違反報告</div>
          <div class="card-body">
          
              <div class="form-group">
                <label for="text">理由</label>
                <input type="text" class="form-control" id="text" name="text" />
              </div>
              
             
              <form action="{{ route('breach')}}" method="post">
                            @csrf
        
        <div class="text-right">
                <button type="submit" class="btn btn-primary">報告する</button>
              </div>
            </form>

            </div>
        </nav>
      </div>
    </div>
    </form>
  </div>
@endsection