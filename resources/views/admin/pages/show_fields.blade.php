<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $page->title }}</p>
</div>

<!-- Alias Field -->
<div class="form-group">
    {!! Form::label('alias', 'Alias:') !!}
    <p>{{ $page->alias }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $page->body }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $page->active }}</p>
</div>

