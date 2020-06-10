@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Create User</h1>
            {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'put']) !!}
            @include('users._form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
