@props(['items', 'icon' => 'entypo-check'])

<ul role="list" class="mt-6 space-y-6">
    @foreach ($items as $item)
        <li class="flex">
            @svg($icon, 'h-6 w-6 flex-shrink-0 text-primary')
            <span class="ml-3 text-gray-500">{{ $item }}</span>
        </li>
    @endforeach
</ul>