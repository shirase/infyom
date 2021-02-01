<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('fields.name')) !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('fields.email')) !!}
    <p>{{ $user->email }}</p>
</div>
