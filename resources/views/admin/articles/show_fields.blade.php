<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('publish_at', \App\Models\Article::label('publish_at')) !!}
    <p>{{ $article->publish_at }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', \App\Models\Article::label('category_id')) !!}
    <p>{{ $article->category->title }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', \App\Models\Article::label('status')) !!}
    <p>{{ $article->statusName() }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', \App\Models\Article::label('title')) !!}
    <p>{{ $article->title }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', \App\Models\Article::label('slug')) !!}
    <p>{{ $article->slug }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', \App\Models\Article::label('description')) !!}
    <p>{{ $article->description }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', \App\Models\Article::label('body')) !!}
    <p>{{ $article->body }}</p>
</div>

<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('created_at', \App\Models\Article::label('created_at')) !!}
    <p>{{ $article->created_at }}</p>
</div>

<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('updated_at', \App\Models\Article::label('updated_at')) !!}
    <p>{{ $article->updated_at }}</p>
</div>


