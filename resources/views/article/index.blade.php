<?php
/**
 * @var $page \App\Models\Page
 * @var $category \App\Models\ArticleCategory
 * @var $models \App\Models\Article[]
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h1>{{ $category ? $category->title : $page->title }}</h1>

        @foreach($models as $model)
            <div class="my-4">
                <div class="lead">{{ $model->title }}</div>
                @if ($model->description)<p>{{ $model->description }}</p>@endif
                <p><a href="{{ route('article.show', ['slug' => $model->slug]) }}">Подробнее</a></p>
            </div>
        @endforeach
    </div>
@endsection
