@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">@lang('Страницы')</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('admin.pages.create') }}">@lang('Добавить')</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="search_container">
                    <form method="get" class="form-inline pull-right">
                        <div class="form-group">
                            <label>@lang('Search')</label>
                            <input class="form-control" type="text" name="q" value="{{ Request::query('q') }}">
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>

                @include('admin.pages.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

