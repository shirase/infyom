<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('fields.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('fields.email')) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('fields.password')) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', __('fields.password_confirmation')) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<?php
$roles = app(\App\Repositories\RoleRepository::class)->index();
?>

<div class="col-sm-6">
    <h2>Роли</h2>
    @foreach($roles as $role)
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="roles[{{ $role['role'] }}]" {{ isset($userRoles) && $userRoles[$role['role']] ? 'checked' : '' }}>
                {{ $role['name'] }}
            </label>
        </div>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('Cancel')</a>
</div>
