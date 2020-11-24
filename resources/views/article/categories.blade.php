<?php
/**
 * @var $category \App\Models\Page
 * @var $models \App\Models\ArticleCategory[]
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h1>{{ $category->title }}</h1>

        @foreach($models as $model)
            <div class="my-4">
                <div class="lead">{{ $model->title }}</div>
                <p><a href="{{ route('article.show', ['slug' => $model->slug]) }}">Подробнее</a></p>
            </div>
        @endforeach
    </div>
@endsection
