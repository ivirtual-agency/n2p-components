@props(['href', 'route'])

<a {{ $attributes
    ->except(['href', 'route'])
    ->merge([
        'class' => '-m-3 flex items-center rounded-md p-3 hover:bg-gray-50',
        'href' => $href ?? route($route),
]) }}>
    <span class="ml-3 text-base font-medium text-gray-900">
        {{ $slot }}
    </span>
</a>