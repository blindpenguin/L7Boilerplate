@extends('layouts.app')
@section('content')
    <div class="row pb-3">
        <div class="col">
            {{ link_to_route('roles.create', 'New Role', [], ['class' => 'btn btn-sm btn-primary float-right']) }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('created_at', 'Created At')</th>
                <th>@sortablelink('updated_at', 'Updated At')</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ ucfirst($role->name) }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>{{ $role->updated_at }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('roles.show', $role->id) }}">Show</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
