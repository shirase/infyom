<?php
/**
 * @var $model \App\Models\Article
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h2>{{ $model->title }}</h2>
        <div>
            {!! $model->body !!}
        </div>
    </div>
@endsection
