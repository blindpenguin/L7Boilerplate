@extends('layouts.app')
@section('content')
    <div class="row pb-3">
        <div class="col">
            {{ link_to_route('users.create', 'New User', [], ['class' => 'btn btn-sm btn-primary float-right']) }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('email', 'E-Mail')</th>
                <th>@sortablelink('created_at', 'Created At')</th>
                <th>@sortablelink('updated_at', 'Updated At')</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('users.show', $user->id) }}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
