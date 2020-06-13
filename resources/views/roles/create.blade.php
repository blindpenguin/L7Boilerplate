@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Create Role</h1>
            {!! Form::open(['route' => 'roles.store']) !!}
            @include('roles._form')
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            {{ link_to_route('roles.index', 'back to index', [], ['class' => 'btn btn-secondary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
