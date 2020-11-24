<?php
/**
 * @var $model \App\Models\Page
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h1>{{ $model->title }}</h1>
        <div class="my-4">
            {!! $model->body !!}
        </div>
    </div>
@endsection
