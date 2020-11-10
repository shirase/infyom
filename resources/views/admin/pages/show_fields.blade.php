<!--  Lft Field -->
<div class="form-group">
    {!! Form::label('_lft', ' Lft:') !!}
    <p>{{ $page->_lft }}</p>
</div>

<!--  Rgt Field -->
<div class="form-group">
    {!! Form::label('_rgt', ' Rgt:') !!}
    <p>{{ $page->_rgt }}</p>
</div>

<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <p>{{ $page->parent_id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $page->title }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $page->slug }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $page->status }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $page->body }}</p>
</div>

