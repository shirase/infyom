<?php
/**
 * @var $model \App\Models\Article
 * @var $category \App\Models\ArticleCategory
 * @var $canonical string
 */
?>

@extends('layouts.app')

@section('title', $model->title)

@if($canonical)
    @push('meta')
        <link rel="canonical" href="{{ $canonical }}" />
    @endpush
@endif

@section('content')
    <div class="m-4">
        <h1>{{ $model->title }}</h1>
        <div class="my-4" data-ckeditor>
            {!! $model->body !!}
        </div>
    </div>
@endsection
