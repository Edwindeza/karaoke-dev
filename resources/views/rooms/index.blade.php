@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Rooms <a href="{{ url('/rooms/create') }}" class="btn btn-primary btn-xs" title="Add New Room"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> IP </th><th> Channel </th><th> Status </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($rooms as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->IP }}</td><td>{{ $item->channel }}</td><td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ url('/rooms/' . $item->id) }}" class="btn btn-success btn-xs" title="View Room"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/rooms/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Room"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/rooms', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Room" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Room',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $rooms->render() !!} </div>
    </div>

</div>
@endsection
