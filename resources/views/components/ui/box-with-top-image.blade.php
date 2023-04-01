@props(['image'])

<div class="relative shadow-xl rounded p-8">

    <img src="{{ asset($image) }}" loading="lazy"
        class="h-20 mb-2" @isset($title) alt="{{ $title }}" title="{{ $title }}" @endisset>

    @isset($title)
        <h3 class="mt-2 text-xl font-semibold text-gray-900">{{ $title }}</h3>
    @endisset

    <div>
        {{ $slot }}
    </div>
</div>