@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Категории статей')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($articleCategory, ['route' => 'admin.article-categories.store']) !!}

                        @include('admin.article_categories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
