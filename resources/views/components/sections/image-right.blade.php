@props([
    'title', 
    'subtitle', 
    'text', 
    'image'
])

<x-n2p::ui.section>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="mx-auto max-w-xl flex flex-col justify-center h-full">
            @isset($subtitle)
                <p class="text-lg text-primary">
                    {{ $subtitle }}
                </p>
            @endisset

            <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                {{ $title }}
            </h2>

            <p class="mt-4 text-lg text-gray-500">
                {{ $text }}
            </p>

            {{ $slot }}
        </div>

        <div class="relative flex items-center justify-center lg:relative lg:m-0 lg:h-full lg:px-0">
            {{ $image }}
        </div>
    </div>
</x-n2p::ui.section>