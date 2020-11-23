<?php
/**
 * @var $category \App\Models\Page
 * @var $models \App\Models\ArticleCategory[]
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h2>{{ $category->title }}</h2>

        @foreach($models as $model)
            <div class="card">
                <div class="card-header">{{ $model->title }}</div>
                <div class="card-footer"><a href="{{ route('article.index', ['slug' => $model->slug]) }}">Подробнее</a></div>
            </div>
        @endforeach
    </div>
@endsection
