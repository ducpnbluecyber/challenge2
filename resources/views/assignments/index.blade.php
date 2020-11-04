@extends('base')
@section('main')
<h2> List Assignments</h2>
<div>
    <a style="margin: 19px;" href="{{ route('assignments.create')}}" class="btn btn-primary">+Add</a>
</div>
    <table class="table table-striped">
    <thead>
        <tr>
          <td>Due To</td>
          <td>Description</td>
          <td>Filename</td>
          <td>#</td>
        </tr>
    </thead>
    <tbody>
        @foreach($assignments as $assignment)
        <tr>
            <td>{{$assignment->due_to}}</td>
            <td>{{$assignment->description}}</td>
            <td>{{$assignment->filename}}</td>
            <td>
            <a href="{{ route('assignments.show',$assignment->id)}}" class="btn btn-primary">Show</a>
            <form action="{{ route('assignments.destroy', $assignment->id)}}" method="post">
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