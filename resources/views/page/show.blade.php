<?php
/**
 * @var $model \App\Models\Page
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        {!! $model->body !!}
    </div>
@endsection
