@props([
    'title' => trans('net2phone::call-to-action.title'),
    'text' => trans('net2phone::call-to-action.text'),
    'button' => true,
    'image' => 'vendor/net2phone/images/call-to-action.webp',
    'subtitle',
])

<x-n2p::ui.section id="call-to-action" class="bg-gradient-call-to-action">
    <div class="flex flex-col lg:grid gap-12 md:grid-cols-3 lg:gap-4 flex items-center justify-center">
        <div class="md:col-span-2 text-center md:text-left">
            @isset($subtitle)
                <p class="mb-2 text-white text-lg">
                    {{ $subtitle }}
                </p>
            @endisset

            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                <span class="block">
                    {{ $title }}
                </span>
            </h2>

            <p class="mt-4 text-lg leading-6 text-white">
                {{ $text }}
            </p>

            {{ $slot }}

            @if ($button)
                <a href="{{ route($route ?? config('net2phone.default_contact_route_name')) }}">
                    <x-n2p::ui.button-inverted class="mt-8">
                        @lang('net2phone::call-to-action.button')
                    </x-n2p::ui.button-inverted>
                </a>
            @endif
        </div>

        <div class="p-8">
            <img src="{{ asset($image) }}" alt="{{ $title }}" title="{{ $title }}" loading="lazy">
        </div>
    </div>
</x-n2p::ui.section>