<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $page->id }}</p>
</div>

<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', __('fields.parent_id')) !!}
    <p>{{ $page->parent_id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('fields.title')) !!}
    <p>{{ $page->title }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', __('fields.slug')) !!}
    <p>{{ $page->slug }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('fields.status')) !!}
    <p>{{ $page->status }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', __('fields.body')) !!}
    <p>{{ $page->body }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('fields.page.type')) !!}
    <p>{{ $page->type }}</p>
</div>

