<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('publish_at', __('fields.publish_at')) !!}
    <p>{{ $article->publish_at }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', __('fields.category_id')) !!}
    <p>{{ $article->category->title ?? '' }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('fields.status')) !!}
    <p>{{ $article->statusName() }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('fields.title')) !!}
    <p>{{ $article->title }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', __('fields.slug')) !!}
    <p>{{ $article->slug }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('fields.image')) !!}
    <p>@if($article->image_path)<img src="/glide/public/{{ $article->image_path }}?w=200" width="200">@endif</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('fields.description')) !!}
    <p>{{ $article->description }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', __('fields.body')) !!}
    <p>{{ $article->body }}</p>
</div>

<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('fields.created_at')) !!}
    <p>{{ $article->created_at }}</p>
</div>

<!-- Publish At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('fields.updated_at')) !!}
    <p>{{ $article->updated_at }}</p>
</div>


