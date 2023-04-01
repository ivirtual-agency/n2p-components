@props(['href', 'route'])

<li>
    <a {{ $attributes
        ->merge(['class' => 'text-base text-gray-300 hover:text-white'])
        ->except(['href', 'route'])
        ->merge(['href' => $href ?? route($route)]) 
    }}>
        {{ $slot }}
    </a>
</li>