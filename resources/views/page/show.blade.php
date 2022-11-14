<?php
/**
 * @var $model \App\Models\Page
 */
?>

@extends('layouts.app')

@section('title', $model->title . ' | ' . config('app.name'))
@section('description', rtrim(trim($model->title), ' .,?!') . '. Подробнее на нашем сайте.')

@section('content')
    <div class="m-4">
        <h1>{{ $model->title }}</h1>
        <div class="my-4">
            {{ Widget::run(\App\Widgets\InlineEditor::class, ['body' => $model->body, 'saveUrl' => route('pages.store', ['id' => $model->id])]) }}
        </div>
    </div>
@endsection
