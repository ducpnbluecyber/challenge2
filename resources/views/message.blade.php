@extends('base')
@section('main')
<h2> Rceceived mesages</h2>
    <table class="table table-striped">
    <thead>
        <tr>
          <td>Time</td>
          <td>Content</td>
          <td>From</td>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            <td>{{$message->created_at}}</td>
            <td>{{$message->body}}</td>
            <td>{{$message->fullname}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <div>
    </div>
@endsection