<?php
/**
 * @var $page \App\Models\Page
 * @var $category \App\Models\ArticleCategory
 * @var $models \App\Models\Article[]|\Illuminate\Pagination\LengthAwarePaginator
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h1>{{ $category ? $category->title : $page->title }}</h1>

        @foreach($models as $model)
            <div class="my-4">
                @if($model->image_path)
                    <div class="mb-2">
                        <img src="{{ \App\Helpers\GlideHelper::createPublicUrl($model->image_path, ['w' => 150]) }}">
                    </div>
                @endif
                <p class="lead">{{ $model->title }}</p>
                @if ($model->description)<p>{{ $model->description }}</p>@endif
                <p><a href="{{ $category ? route('article.category.show', ['slug' => $model->slug, 'category' => $category->slug]) : route('article.show', ['slug' => $model->slug]) }}">Подробнее</a></p>
            </div>
        @endforeach

        {!! $models->appends(\Request::except('page'))->render() !!}
    </div>
@endsection
