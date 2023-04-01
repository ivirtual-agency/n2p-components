@props(['href', 'route'])

<li>
    @if (isset($href) || isset($route))
        <a {{ $attributes
            ->merge(['class' => 'text-base text-gray-300 hover:text-white'])
            ->except(['href', 'route'])
            ->merge(['href' => $href ?? route($route)]) 
        }}>{{ $slot }}</a>
    @else
        <p {{ $attributes->merge(['class' => 'text-base text-gray-300'])
        }}>{{ $slot }}</p>
    @endif
</li>