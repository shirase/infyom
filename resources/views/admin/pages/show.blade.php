@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Страницы')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.pages.show_fields')
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-default">@lang('Назад')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
