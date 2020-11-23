<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('fields.title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', __('fields.slug')) !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', __('fields.parent_id')) !!}
    {!! Form::select('parent_id', ['' => '-'] + \App\Models\Page::pluck('title')->toArray(), null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('fields.status')) !!}
    {!! Form::select('status', \App\Models\Page::statuses(), null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('fields.page.type')) !!}
    {!! Form::select('type', ['' => '-'] + app(\App\Page\PageType::class)->getTypes(), null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', __('fields.body')) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Сохранить'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.pages.index') }}" class="btn btn-default">@lang('Отмена')</a>
</div>
