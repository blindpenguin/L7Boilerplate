<div>
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', isset($user) ? $user->name : null) }}
</div>
<div>
    {{ Form::label('email', 'E-Mail') }}
    {{ Form::text('email', isset($user) ? $user->email : null) }}
</div>
<div>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['autocomplete' => 'new-password']) }}
</div>
{{ Form::submit('Save') }}
{{ link_to_route('users.index', 'back to index') }}
