<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', isset($role) ? $role->name : null, ['class' => 'form-control']) }}
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('permissions', 'Permissions') }}
    {{ Form::select('permissions[]', $permissions, isset($role) ? $role->permissions : null, array('multiple' => true, 'class' => 'form-control')) }}
    @error('permissions')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
