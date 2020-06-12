@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $user->name }}</strong>
                    {{ link_to_route('users.edit', 'Edit user', [$user->id], ['class' => 'btn btn-sm btn-warning float-right']) }}
                    {{ link_to_route('users.index', 'Back to index', [], ['class' => 'btn btn-sm btn-primary float-right']) }}
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">E-Mail: {{ $user->email }}</li>
                        <li class="list-group-item">
                            Roles:
                            @foreach($user->roles as $role)
                                <div class="badge badge-primary">{{ $role->name }}</div>
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <!-- delete button -->
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete', 'id' => 'delete']) !!}
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
@section('bottom_javascripts')
    <script>
        const deleteForm = document.getElementById('delete');
        deleteForm.addEventListener('click', function (event) {
            event.preventDefault();
            if (confirm('Do you really want to delete this user?')) {
                document.getElementById('confirm').checked = true;
                console.log(document.getElementById('confirm').checked)
                deleteForm.submit();
            }
        })
    </script>
@endsection
