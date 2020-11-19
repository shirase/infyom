<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', \App\Models\ArticleCategory::label('title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Alias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', \App\Models\ArticleCategory::label('slug')) !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', \App\Models\ArticleCategory::label('status')) !!}
    {!! Form::select('status', \App\Models\Article::statuses(), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Сохранить'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.article-categories.index') }}" class="btn btn-default">@lang('Отмена')</a>
</div>
