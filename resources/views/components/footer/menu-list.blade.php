<div {{ $attributes }}>
    <h3 class="text-lg font-medium text-white">
        {{ $title }}
    </h3>

    <ul role="list" class="mt-4 space-y-4">
        {{ $slot }}
    </ul>
</div>