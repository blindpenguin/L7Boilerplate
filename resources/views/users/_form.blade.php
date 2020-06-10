<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', isset($user) ? $user->name : null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'E-Mail') }}
    {{ Form::text('email', isset($user) ? $user->email : null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['autocomplete' => 'new-password', 'class' => 'form-control']) }}
</div>
{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
{{ link_to_route('users.index', 'back to index', [], ['class' => 'btn btn-secondary']) }}
