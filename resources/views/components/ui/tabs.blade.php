@props([
    'items' => 0,
    'dark' => false
])

<div class="mx-auto mt-8 max-w-7xl sm:flex sm:flex-wrap sm:justify-center md:mt-12" x-data="{ selected: 0 }">
    <div class="hidden sm:flex mt-8 w-full justify-center">
        @for ($i = 0; $i < $items; $i++)
            <button type="button" class="pb-4 px-4 border-b-2 text-lg" @click="selected = {{ $i }}" :class="{ 
                    '{{ $dark ? 'text-white' : 'text-black' }} border-primary': selected === {{ $i }}, 
                    '{{ $dark ? 'border-gray-400 text-gray-400' : 'border-gray-100 text-gray-500' }}': selected !== {{ $i }}
                }">
                <span>{{ ${'item_' . $i}->attributes->get('menu') }}</span>
            </button>
        @endfor
    </div>

    <div class="flex flex-wrap mt-8 space-y-4">

        @for ($i = 0; $i < $items; $i++)

            {{-- Mobile Button --}}
            <div class="w-full block sm:hidden">
                <button type="button" @click="selected = (selected === {{ $i }} ? null : {{ $i }})"
                    class="w-full flex justify-between items-center px-4 py-2 bg-gray-100">
                    <p>{{ ${'item_' . $i}->attributes->get('menu') }}</p>
                    <span x-show="selected !== {{ $i }}">
                        @svg('entypo-plus', 'w-8 h-8')
                    </span>
                    <span x-show="selected === {{ $i }}">
                        @svg('entypo-minus', 'w-8 h-8')
                    </span>
                </button>
            </div>
            {{-- End Mobile Button --}}

            {{-- Content --}}
            <div x-show="selected === {{ $i }}" class="flex flex-wrap" 
                x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 translate-y-1" 
                x-transition:enter-end="opacity-100 translate-y-0">

                @if (${'item_' . $i}->attributes->get('image'))

                    @php
                        $itemTitle = ${'item_' . $i}->attributes->get('menu');

                        if (${'item_' . $i}->attributes->get('title')) {
                            $itemTitle .= ' - ' . ${'item_' . $i}->attributes->get('title');
                        } 
                    @endphp

                    {{-- With Image --}}
                    <div class="w-full sm:w-2/5 sm:rounded-lg p-8 flex justify-center items-center">
                        <img src="{{ asset(${'item_' . $i}->attributes->get('image')) }}" 
                            alt="{{ $itemTitle }}"
                            title="{{ $itemTitle }}"
                            loading="lazy">
                    </div>
        
                    <div class="w-full sm:w-3/5 text-left flex flex-col justify-center p-8">
                        
                        @if (${'item_' . $i}->attributes->get('title'))
                            <h3 class="mt-4 text-xl font-bold tracking-tight text-black sm:text-2xl md:text-3xl">
                                {{ ${'item_' . $i}->attributes->get('title') }}
                            </h3>
                        @endif

                        {{ ${'item_' . $i} }}
                    </div>
                @else
                    {{-- Fully custom --}}
                    <div class="w-full p-8">
                        {{ ${'item_' . $i} }}
                    </div>
                @endif
            </div>
            {{-- End Content --}}
        @endfor
    </div>
</div>