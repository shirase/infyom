<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('publish_at', 'Publish At:') !!}
    <p>{{ $article->publish_at }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $article->title }}</p>
</div>

<!-- Alias Field -->
<div class="form-group">
    {!! Form::label('alias', 'Alias:') !!}
    <p>{{ $article->alias }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $article->description }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $article->body }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $article->category_id }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $article->active }}</p>
</div>

