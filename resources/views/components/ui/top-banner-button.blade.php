@props(['href', 'route'])

<a {{ $attributes
    ->class(['group flex items-center justify-center text-gray-500 hover:text-gray-900 hover:underline'])
    ->except(['href', 'route'])
    ->merge(['href' => $href ?? route($route)])
}}>
    {{ $slot }}
</a>