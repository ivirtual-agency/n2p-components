<section class="bg-secondary" id="features">

    @svg('n2p-secondary-top-divider', 'w-full')

    <div class="py-8 sm:py-16">
        <div class="mx-auto max-w-7xl py-8">

            <h2 class="text-center max-w-6xl mx-auto text-xl font-bold tracking-tight text-white sm:text-3xl md:text-4xl mb-8">
                {{ $title }}
            </h2>

            {{ $slot }}
        </div>
    </div>

    @svg('n2p-secondary-bottom-divider', 'w-full')

</section>