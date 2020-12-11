@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">@lang('Страницы')</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div id="jstree"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#jstree').jstree({
            core: {
                data: {
                    'url' : function (node) {
                        return node.id;
                    },
                    'data' : function (node) {
                        return { 'id' : node.id };
                    }
                },
            }
        });
    </script>
@endpush

