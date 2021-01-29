<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('fields.title')) !!}
    <p>{{ $articleCategory->title }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', __('fields.slug')) !!}
    <p>{{ $articleCategory->slug }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', __('fields.position')) !!}
    <p>{{ $articleCategory->position }}</p>
</div>

