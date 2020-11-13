<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('publish_at', 'Publish At:') !!}
    <p>{{ $article->publish_at }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    <p>{{ $article->category->title }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Status:') !!}
    <p>{{ $article->statusName() }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $article->title }}</p>
</div>

<!-- Alias Field -->
<div class="form-group">
    {!! Form::label('alias', 'Slug:') !!}
    <p>{{ $article->slug }}</p>
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

<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $article->created_at }}</p>
</div>

<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $article->updated_at }}</p>
</div>


