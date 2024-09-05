@props([
    'title', 
    'text', 
    'button',
    'image',
    'divider' => true
])

<section {{ $attributes->merge(['class' => 'relative bg-header']) }}>
    <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-16 py-6 sm:py-12">
        <div class="mx-auto max-w-7xl">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                @isset ($image)
                    <div
                        class="px-4 sm:px-6 sm:text-center md:mx-auto md:max-w-3xl lg:col-span-8 lg:flex lg:items-center lg:text-left">
                        <div class="text-center md:text-left">

                            @isset($subtitle)
                                <h2 class="text-lg font-semibold text-primary">
                                    {{ $subtitle }}
                                </h2>
                            @endisset

                            <h1 class="mt-4 text-4xl font-bold tracking-tight sm:text-4xl md:text-5xl">
                                {{ $title }}
                            </h1>

                            @isset($text)
                                <p class="mt-3 text-base sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                                    {{ $text }}
                                </p>
                            @endisset

                            @isset ($button)
                                <div class="mt-8 flex justify-center md:justify-start space-x-4">
                                    {{ $button }}
                                </div>
                            @endisset
                        </div>
                    </div>
                    
                    <div class="mt-16 sm:mt-24 lg:col-span-4 lg:mt-0">
                        <div class="sm:mx-auto sm:w-full sm:max-w-md sm:overflow-hidden sm:rounded-lg">
                            <div class="p-8">
                                <img src="{{ asset($image) }}" loading="lazy" alt="net2phone - {{ $title }}" title="net2phone - {{ $title }}">
                            </div>
                        </div>
                    </div>
                @else
                    <div
                        class="px-4 sm:px-6 md:mx-auto md:max-w-5xl lg:col-span-12 lg:flex lg:items-center">
                        <div class="text-center">

                            @isset($subtitle)
                                <h2 class="text-lg font-semibold text-primary">
                                    {{ $subtitle }}
                                </h2>
                            @endisset

                            <h1 class="mt-4 text-4xl font-bold tracking-tight sm:text-4xl md:text-5xl">
                                {{ $title }}
                            </h1>

                            @isset($text)
                                <p class="mt-3 text-base sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                                    {{ $text }}
                                </p>
                            @endisset

                            @isset($button)
                                <div class="mt-8 flex justify-center space-x-4">
                                    {{ $button }}
                                </div>
                            @endisset
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>

    @if ($divider)
        @svg('n2p-intro-divider', 'w-full')
    @endif
</section>