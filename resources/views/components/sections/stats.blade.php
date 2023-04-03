@props(['items' => [], 'icon' => 'entypo-plus'])

<section {{ $attributes->merge(['class' => 'relative overflow-hidden pb-32']) }}>

    {{ $slot }}

    <div class="mx-auto max-w-7xl pt-10 flex flex-wrap text-center sm:text-left">

        <h2 class="w-full sm:w-2/5 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl mb-12">
            {{ $title }}
        </h2>

        <div class="w-full sm:w-3/5 flex flex-col sm:flex-row space-x-0 sm:space-x-4 space-y-4 sm:space-y-0">
            @foreach ($items as $item)
                <div class="text-secondary">
                    <div class="flex justify-center sm:justify-start mt-4 sm:mt-0">
                        <span class="text-6xl">
                            {{ $item['number'] }}
                        </span>
                        <span>
                            @svg($icon, 'h-6 w-6')
                        </span>
                    </div>
                    <p class="mt-3 text-base sm:mt-5 sm:text-xl">
                        {{ $item['text'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>