@extends('base')
@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User name:</strong>
                {{ $nguoidung->username }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Full name:</strong>
                {{ $nguoidung->fullname }}
            </div>
        </div>
    </div>

    <h2>Create a new message</h2>
    <form action="{{ url('messages') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <input type="hidden" class="form-control" name="sent_to_id" value="{{ $nguoidung->id }}"/>
            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Message</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
    </form>


    <h2> Messages sent to Russel Westbook</h2>
    <table class="table table-striped">
    <thead>
        <tr>
          <td>Time</td>
          <td>Content</td>
          <td>#</td>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            <td>{{$message->created_at}}</td>
            <td>{{$message->body}}</td>
        
        </tr>
        @endforeach
    </tbody>
    </table>
    <div>
    </div>
@endsection