@props(['href', 'route'])

@php
    $class = isset($route) && request()->routeIs($route) ? 'text-primary' : 'text-gray-500';
@endphp

<a {{ $attributes
    ->except(['href', 'route'])
    ->merge([
        'class' => 'text-base font-medium hover:text-primary uppercase ' . $class,
        'href' => $href ?? route($route),
]) }}>
    {{ $slot }}
</a>