<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $page->id }}</p>
</div>

<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', \App\Models\Page::label('parent_id')) !!}
    <p>{{ $page->parent_id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', \App\Models\Page::label('title')) !!}
    <p>{{ $page->title }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', \App\Models\Page::label('slug')) !!}
    <p>{{ $page->slug }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', \App\Models\Page::label('status')) !!}
    <p>{{ $page->status }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', \App\Models\Page::label('body')) !!}
    <p>{{ $page->body }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', \App\Models\Page::label('type')) !!}
    <p>{{ $page->type }}</p>
</div>

