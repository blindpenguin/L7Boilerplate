<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', isset($user) ? $user->name : null, ['class' => 'form-control']) }}
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('email', 'E-Mail') }}
    {{ Form::text('email', isset($user) ? $user->email : null, ['class' => 'form-control']) }}
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('roles', 'Roles') }}
    {{ Form::select('roles[]', $roles, isset($user) ? $user->roles : null, array('multiple' => true, 'class' => 'form-control')) }}
    @error('roles')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['autocomplete' => 'new-password', 'class' => 'form-control']) }}
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('password_confirmation', 'Password Confirm') }}
    {{ Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'new-password']) }}
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
