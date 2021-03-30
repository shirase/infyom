<?php
/**
 * @var $page \App\Models\Page
 * @var $models \App\Models\ArticleCategory[]
 */
?>

@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="m-4">
        <h1>{{ $page->title }}</h1>

        @foreach($models as $model)
            <div class="my-4">
                <p class="lead">{{ $model->title }}</p>
                <p><a href="{{ route('article.index', ['category' => $model->slug]) }}">Подробнее</a></p>
            </div>
        @endforeach
    </div>
@endsection
