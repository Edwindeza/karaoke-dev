@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Room {{ $room->id }}</h1>

    {!! Form::model($room, [
        'method' => 'PATCH',
        'url' => ['/rooms', $room->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('IP') ? 'has-error' : ''}}">
                {!! Form::label('IP', 'Ip', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('IP', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('IP', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('channel') ? 'has-error' : ''}}">
                {!! Form::label('channel', 'Channel', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('channel', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('channel', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('status', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection