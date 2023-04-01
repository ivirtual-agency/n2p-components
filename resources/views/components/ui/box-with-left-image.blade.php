@props(['image', 'title'])

<div class="flex flex-col sm:flex-row overflow-hidden rounded-lg shadow-lg m-8 sm:m-0">

    <div class="flex-shrink-0 bg-gradient-feature p-8 sm:p-16 flex items-center">
        <img class="h-20 w-auto sm:w-full mx-auto object-cover" loading="lazy"
            src="{{ asset($image) }}" @isset($title) alt="{{ $title }}" title="{{ $title }}" @endisset>
    </div>

    <div class="flex flex-1 flex-col justify-between bg-white p-8">
        <div class="flex-1">
            <div class="mt-2 block">
                @isset($title)
                    <h3 class="mt-2 text-xl font-semibold text-gray-900">{{ $title }}</h3>
                @endisset

                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>