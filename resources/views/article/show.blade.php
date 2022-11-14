<?php
/**
 * @var $model \App\Models\Article
 * @var $category \App\Models\ArticleCategory
 * @var $canonical string
 */
?>

@extends('layouts.app')

@section('title', $model->title . ' | ' . 'Статьи')
@section('description', rtrim(trim($model->title), ' .,?!') . '. Подробнее в статье на нашем сайте.')

@if($canonical)
    @push('meta')
        <link rel="canonical" href="{{ $canonical }}" />
    @endpush
@endif

@section('content')
    <div class="m-4">
        <h1>{{ $model->title }}</h1>
        <div class="my-4">
            {{ Widget::run(\App\Widgets\InlineEditor::class, ['body' => $model->body, 'saveUrl' => route('articles.store', ['id' => $model->id])]) }}
        </div>
    </div>
@endsection
