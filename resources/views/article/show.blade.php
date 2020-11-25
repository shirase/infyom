<?php
/**
 * @var $model \App\Models\Article
 * @var $category \App\Models\ArticleCategory
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        @if ($category)
            <h2>{{ $category->title }}</h2>
        @endif
        <h1>{{ $model->title }}</h1>
        <div class="my-4">
            {!! $model->body !!}
        </div>
    </div>
@endsection
