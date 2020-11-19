@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Статьи')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.articles.show_fields')
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-default">@lang('Назад')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
