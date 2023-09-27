@props(['active'])

@php


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
