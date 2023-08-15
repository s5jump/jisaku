@extends('layouts.layout')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">違反報告</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="name" class="form-control" id="name" name="name"  />
              </div>
              <div class="form-group">
                <label for="text">理由</label>
                <input type="text" class="form-control" id="text" name="text"             />
              </div>
              
             
          
        
        <div class="text-right">
                <button type="submit" class="btn btn-primary">報告する</button>
              </div>
            </form>

            </div>
        </nav>
      </div>
    </div>
  </div>
@endsection