<?php
/**
 * @var array $breadcrumbs
 */
?>
@if($breadcrumbs)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">@lang('Home')</a></li>
            @foreach($breadcrumbs as $breadcrumb)
                @if($breadcrumb['url'] ?? null)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] ?? '' }}</a></li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['label'] ?? '' }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
