@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Пользователи')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.users.show_fields')
                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('Back')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
