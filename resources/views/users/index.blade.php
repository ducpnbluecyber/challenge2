@extends('base')
@section('main')
<div>
    <a style="margin: 19px;" href="{{ route('users.create')}}" class="btn btn-primary">New user</a>

</div>
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>


<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">users</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Username</td>
          <td>Fullname</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Role</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->username}}</td>
            <td>{{$user->fullname}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->role}}</td>
            <td>
                <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
            </td>
            <td>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection


