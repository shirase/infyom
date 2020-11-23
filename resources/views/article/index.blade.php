<?php
/**
 * @var $category \App\Models\Page
 */
?>

@extends('layouts.app')

@section('content')
    <div class="m-4">
        <h2>Список статей</h2>
        {!! $category->title !!}
    </div>
@endsection
