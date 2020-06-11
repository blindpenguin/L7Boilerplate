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
                    <ul>
                        <li>E-Mail: {{ $user->email }}</li>
                        <li>
                            Roles: @foreach($user->roles as $role) <div class="badge badge-primary">{{ $role->name }}</div> @endforeach
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
