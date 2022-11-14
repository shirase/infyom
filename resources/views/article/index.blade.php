<?php
/**
 * @var $page \App\Models\Page
 * @var $category \App\Models\ArticleCategory
 * @var $models \App\Models\Article[]|\Illuminate\Pagination\LengthAwarePaginator
 */
?>

@extends('layouts.app')

@section('title', ($category ? $category->title : $page->title) . ' | ' . 'Список статей')
@section('description', rtrim(trim($category ? $category->title : $page->title), ' .,?!') . '. Список статей на нашем сайте.')

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
                    @can(\App\Repositories\RoleRepository::ADMINISTRATOR)
                    <div class="editor-panel">
                        <a class="j-frame-dialog" data-type="update" href="{{ route('admin.articles.edit', [$model->id]) }}" target="_blank">Изменить</a>
                    </div>
                    @endcan
                @if ($model->description)<p>{{ $model->description }}</p>@endif
                <p><a href="{{ $category ? route('article.category.show', ['slug' => $model->slug, 'category' => $category->slug]) : route('article.show', ['slug' => $model->slug]) }}">Подробнее</a></p>
            </div>
        @endforeach

        {!! $models->appends(\Request::except('page'))->render() !!}
    </div>
@endsection
