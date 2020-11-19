<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', \App\Models\Article::label('title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', \App\Models\Article::label('slug')) !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', \App\Models\Article::label('category_id')) !!}
    {!! Form::select('category_id', ['' => '-'] + \App\Models\ArticleCategory::pluck('title', 'id')->toArray(), null, ['class' => 'form-control']) !!}
</div>

<!-- Publish At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publish_at', \App\Models\Article::label('publish_at')) !!}
    {!! Form::text('publish_at', null, ['class' => 'form-control','id'=>'publish_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#publish_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', \App\Models\Article::label('description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', \App\Models\Article::label('body')) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', \App\Models\Article::label('status')) !!}
    {!! Form::select('status', \App\Models\Article::statuses(), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Сохранить'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.articles.index') }}" class="btn btn-default">@lang('Отмена')</a>
</div>
