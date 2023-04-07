@props(['items', 'icon' => 'entypo-check', 'textColor' => 'text-gray-500', 'iconColor' => 'text-primary'])

<ul role="list" class="mt-6 space-y-6">
    @foreach ($items as $item)
        <li class="flex">
            @svg($icon, 'h-6 w-6 flex-shrink-0 ' . $iconColor)
            <span class="ml-3 {{ $textColor }}">{{ $item }}</span>
        </li>
    @endforeach
</ul>