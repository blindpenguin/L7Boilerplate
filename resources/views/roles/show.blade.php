@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $role->name }}</strong>
                    {{ link_to_route('roles.edit', 'Edit role', [$role->id], ['class' => 'btn btn-sm btn-warning float-right']) }}
                    {{ link_to_route('roles.index', 'Back to index', [], ['class' => 'btn btn-sm btn-primary float-right']) }}
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Permissions:
                            @foreach($role->permissions as $permission)
                                <div class="badge badge-primary">{{ __($permission->name) }}</div>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <!-- delete button -->
                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete', 'id' => 'delete']) !!}
                        {{ Form::checkbox('confirm', null, false, ['style' => 'display: none;', 'id' => 'confirm']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-right']) }}
                    {!! Form::close() !!}
                    @error('confirm')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <!-- end delete button -->
                </div>
            </div>
        </div>
    </div>
@endsection
