@props(['href', 'route'])
    
<a {{ $attributes
    ->except(['href', 'route'])
    ->merge([
        'class' => '-m-3 flex items-start rounded-lg p-2 hover:bg-gray-50',
        'href' => $href ?? route($route)
]) }}>
    <div class="ml-4">
        <p class="text-base font-medium text-gray-900">{{ $slot }}</p>
    </div>
</a>