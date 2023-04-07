@props(['items' => []])

@pushOnce('alpinjs')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.12.0/dist/cdn.min.js"></script>
@endPushOnce

@php
    Artesaos\SEOTools\Facades\JsonLdMulti::newJsonLd();
    Artesaos\SEOTools\Facades\JsonLdMulti::setType('FAQPage');
    Artesaos\SEOTools\Facades\JsonLdMulti::addValue(
        'mainEntity', 
        collect($items)->map(fn($item) => [
            "@type" => "Question",
            "name" => $item['title'],
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => $item['answer']
            ],  
        ])
    );
@endphp

<x-n2p::ui.section class="bg-gradient-to-white">

    <h2 class="text-center text-xl font-bold tracking-tight text-secondary md:text-3xl lg:text-4xl">
        @lang('FAQs')
    </h2>

    <div x-data="{ active: 0 }" class="mt-4 sm:mt-8 mx-auto max-w-3xl w-full min-h-[16rem] space-y-4">
        
        @foreach ($items as $key => $answer)
            <div x-data="{
                id: {{ $key }},
                get expanded() {
                    return this.active === this.id
                },
                set expanded(value) {
                    this.active = value ? this.id : null
                },
            }" role="region" class="transition rounded-lg bg-white shadow">

                <h3 class="bg-white">
                    <button x-on:click="expanded = !expanded" :aria-expanded="expanded"
                        class="flex w-full items-center justify-between px-6 py-4 text-xl font-bold">
                        <span>{{ $answer['title'] }}</span>
                        <span x-show="expanded" aria-hidden="true" class="ml-4">&minus;</span>
                        <span x-show="!expanded" aria-hidden="true" class="ml-4">&plus;</span>
                    </button>
                </h3>

                <div x-show="expanded" x-collapse>
                    <div class="px-6 pb-4">
                        {!! $answer['answer'] !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-n2p::ui.section>