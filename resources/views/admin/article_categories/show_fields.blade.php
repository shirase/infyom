<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', \App\Models\ArticleCategory::label('title')) !!}
    <p>{{ $articleCategory->title }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', \App\Models\ArticleCategory::label('slug')) !!}
    <p>{{ $articleCategory->slug }}</p>
</div>

