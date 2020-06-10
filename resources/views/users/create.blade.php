<h1>Create User</h1>
{!! Form::open(['route' => 'users.store']) !!}
@include('users._form')
{!! Form::close() !!}
