<?php
/**
 * @var $model \App\Models\Data
 */
?>
@extends('admin::layouts.app')

@push('scripts')
    <script src="{{ asset('js/admin/vue.js') }}"></script>
@endpush

@section('content')
    <section class="content-header">
        <h1 class="pull-left">@lang('Редактировать')</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body" id="app">
                <data-string action="{{ route('admin.data.store', [$model->key]) }}" data="{{ $model->data }}"></data-string>
            </div>
        </div>
    </div>
@endsection
