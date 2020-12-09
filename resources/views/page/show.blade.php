<?php
/**
 * @var $model \App\Models\Page
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h1>{{ $model->title }}</h1>
        <div class="my-4" data-ckeditor>
            {!! $model->body !!}
        </div>
    </div>
@endsection
