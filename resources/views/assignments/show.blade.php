@extends('base')
@section('main')
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2>Assignment [{{ $assignment->description }}]</h2>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('assignments.index') }}"> Back</a>
    </div>
  </div>
    </div>
   
    <div class="pull-right">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File:</strong>
                <a href="{{ url('download', $assignment->filename) }}">{{ $assignment->filename }}</a>

                
            </div>
            <div class="form-group">
            <strong>Due to:</strong>
                {{ $assignment->due_to }}
            </div>
        </div>
    </div>

    <table class="table table-bordered">

<tr>

    <th width="280px">Time submit</th>

    <th>File</th>

    <th width="280px">Student</th>

</tr>

@foreach ($submissions as $submission)

<tr>

    <td>{{ $submission->created_at }}</td>

    <td><a href="{{ url('download', $submission->filename) }}">{{ $submission->filename }}</a></td>

    <td>{{ $submission->name }}</td>

</tr>

@endforeach

</table>

@endsection