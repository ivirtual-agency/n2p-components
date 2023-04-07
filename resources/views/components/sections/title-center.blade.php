@props([
    'title',
    'subtitle',
])

<x-n2p::ui.section {{ $attributes }}>
    <div class="text-center">

        <h2 class="max-w-6xl mx-auto text-xl font-bold tracking-tight sm:text-3xl md:text-4xl">
            {{ $title }}
        </h2>

        @isset($subtitle)
            <p class="max-w-3xl mx-auto mt-3 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                {{ $subtitle }}
            </p>
        @endisset
    </div>

    {{ $slot }}
</x-n2p::ui.section>