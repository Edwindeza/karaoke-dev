@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Song</h1>
    <hr/>

    {!! Form::open(['url' => '/songs', 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
                {!! Form::label('code', 'Code', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('code', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cdg') ? 'has-error' : ''}}">
                {!! Form::label('cdg', 'CDG', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('cdg', ['class' => 'form-control']) !!}
                    {!! $errors->first('cdg', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mp3') ? 'has-error' : ''}}">
                {!! Form::label('mp3', 'MP3', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::file('mp3', ['class' => 'form-control']) !!}
                    {!! $errors->first('mp3', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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