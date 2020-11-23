<?php
/**
 * @var $category \App\Models\Page
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h2>{{ $category->title }}</h2>
    </div>
@endsection
