@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Welcome</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
    </div>
@endsection

