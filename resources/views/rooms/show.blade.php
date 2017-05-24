@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Room {{ $room->id }}
        <a href="{{ url('rooms/' . $room->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Room"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['rooms', $room->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Room',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $room->id }}</td>
                </tr>
                <tr><th> IP </th><td> {{ $room->IP }} </td></tr><tr><th> Channel </th><td> {{ $room->channel }} </td></tr><tr><th> Status </th><td> {{ $room->status }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
