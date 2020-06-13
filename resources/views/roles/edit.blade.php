@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Role</h1>
            {!! Form::open(['route' => ['roles.update', $role->id], 'method' => 'put']) !!}
                @include('roles._form')
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                {{ link_to_route('roles.index', 'back to index', [], ['class' => 'btn btn-secondary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
