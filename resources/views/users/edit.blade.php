<h1>Create User</h1>
{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'put']) !!}
@include('users._form')
{!! Form::close() !!}
