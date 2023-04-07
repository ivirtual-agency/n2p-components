@props(['title', 'price', 'items' => [], 'popular'])

<div class="group relative flex flex-col rounded-2xl border border-primary bg-white p-8 shadow-sm hover:scale-105">
    <div class="flex-1">
        
        @isset($price)
            <p class="mb-4 flex items-baseline text-gray-900">
                <span class="text-5xl font-bold tracking-tight">{{ $price }}</span>
                <span class="ml-1 text-xl font-semibold">/@lang('month')</span>
            </p>
        @endisset
        
        <h3 class="text-xl font-semibold text-gray-900">
            {{ $title }}
        </h3>

        <x-n2p::ui.icon-list :items="$items" />

        {{ $slot }}
    </div>

    @if (isset($popular) && $popular)
        <div class="absolute top-0 inset-x-0 -translate-y-1/2 flex items-center justify-center">
            <p class="rounded-full bg-primary py-1.5 px-4 text-sm font-semibold text-white">
                @lang('More popular')
            </p>
        </div>
    @endif

    @isset($button)
        <div class="flex justify-center pt-6">
            {{ $button }}
        </div>
    @endisset
</div>