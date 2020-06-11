@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Create User</h1>
            {!! Form::open(['route' => 'users.store']) !!}
            @include('users._form')
            {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            {{ link_to_route('users.index', 'back to index', [], ['class' => 'btn btn-secondary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
