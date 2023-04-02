@props(['items' => 0])

<div class="py-20" x-data="{ selected: 0 }">
    <div class="mx-auto max-w-6xl px-4 sm:px-">
        <div class="sm:grid grid-cols-5">
            <div class="hidden sm:flex flex-col mt-8 w-full items-start col-span-2">

                @for ($i = 0; $i < $items; $i++) 
                    <button type="button" class="pl-4 py-4 border-l-2 text-lg flex"
                        @click="selected = {{ $i }}" :class="{ 
                                'text-black border-primary': selected === {{ $i }}, 
                                'text-gray-500 border-gray-100': selected !== {{ $i }}
                            }">
                        <span class="w-full text-left">
                            {{ ${'item_' . $i}->attributes->get('title') }}
                        </span>
                    </button>
                @endfor
            </div>

            <div class="col-span-3 flex flex-wrap mt-8 space-y-4 sm:space-y-0 sm:pl-8">

                @for ($i = 0; $i < $items; $i++) 
                
                    {{-- Mobile Button --}} 
                    <div class="w-full block sm:hidden">
                        <button type="button" @click="selected = (selected === {{ $i }} ? null : {{ $i }})"
                            class="w-full flex justify-between items-center px-4 py-2 bg-gray-100">

                            <span>{{ ${'item_' . $i}->attributes->get('title') }}</span>

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
                    <div x-show="selected === {{ $i }}" class="relative flex flex-wrap"
                        x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="opacity-0 translate-y-1" 
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <div class="w-full bg-white shadow-xl rounded p-4 sm:p-12">
                            <div class="text-left z-10">
                                <h3 class="mt-4 text-xl font-bold tracking-tight text-black sm:text-2xl md:text-3xl">
                                    {{ ${'item_' . $i}->attributes->get('title') }}
                                </h3>
                                {{ ${'item_' . $i} }}
                            </div>
                        </div>
                    </div>
                    {{-- End Content --}}

                @endfor
            </div>
        </div>
    </div>
</div>