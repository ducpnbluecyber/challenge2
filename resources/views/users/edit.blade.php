@extends('base')
@section('main')
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
</div>
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a user</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('users.update', ['user' => $nguoidung->id]) }}">
          @method('PUT')
          @csrf
          <div class="form-group">    
              <label>User Name:</label>
              <input type="text" class="form-control" name="username" value="{{ $nguoidung->username }}"/>
          </div>
          <div class="form-group">
              <label>Full Name:</label>
              <input type="text" class="form-control" name="fullname" value="{{ $nguoidung->fullname }}"/>
          </div>
          <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" name="email" value="{{ $nguoidung->email }}" />
          </div>
          <div class="form-group">
              <label>Phone:</label>
              <input type="text" class="form-control" name="phone" value="{{ $nguoidung->phone }}" />
          </div>
          <div class="form-group">
              <label>New Password:</label>
              <input type="text" class="form-control" name="password" />
          </div>                        
          <button type="submit" class="btn btn-success">Edit user</button>
      </form>
  </div>
</div>
</div>
@endsection