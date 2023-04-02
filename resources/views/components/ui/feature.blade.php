<div class="relative p-4 flex flex-col items-start">

    <img src="{{ asset($image) }}" loading="lazy" class="h-16" alt="{{ $title }}" title="{{ $title }}">

    <h3 class="mt-3 text-lg font-semibold text-primary">{{ $title }}</h3>

    <p class="mt-1 text-base text-gray-200 lg:text-lg flex-grow">
        {{ $slot }}
    </p>

    @isset($route)
        <a href="{{ route($route) }}" class="inline-block">
            <button type="button" class="group mt-4 text-base font-semibold text-primary hover:text-white flex justify-end items-center space-x-3">
                <span>@lang('Read more')</span>

                <svg class="w-6 h-6 transition-transform delay-150 group-hover:translate-x-2" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </button>
        </a>
    @endisset
</div>