@prependOnce('alpinjs')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('mobileMenu', {
            open: false,
            toggle() {
                this.open = ! this.open
            }
        })
    })
</script>
@endPrependOnce

<div class="relative shadow bg-white border-b-2 border-gray-100" x-data
    @keydown.escape="$store.mobileMenu.open = false">

    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex items-center justify-between py-6 md:justify-start">
            <div class="flex @if (isset($mobileMenu) || isset($mobileMenuBottom))justify-start @else w-full justify-center @endif lg:w-0 lg:flex-1">
                <a href="{{ url('') }}">
                    <span class="sr-only">net2phone</span>
                    <img class="h-8 w-auto sm:h-10" src="{{ asset('vendor/net2phone/images/logo.png') }}"
                        alt="net2phone" title="net2phone">
                </a>
            </div>

            @if (isset($mobileMenu) || isset($mobileMenuBottom))
                <div class="-my-2 -mr-2 md:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
                        @click="$store.mobileMenu.open = true"
                        @mousedown="if ($store.mobileMenu.open) $event.preventDefault()" aria-expanded="true"
                        :aria-expanded="$store.mobileMenu.open.toString()">
                        <span class="sr-only">@lang('Open menu')</span>
                        @svg('entypo-menu', 'h-6 w-6')
                    </button>
                </div>
            @endif

            @isset($menu)
                <nav class="hidden md:space-x-4 lg:space-x-5 md:flex" x-data="Components.popoverGroup()" x-init="init()">
                    {{ $menu }}
                </nav>
            @endisset

            @isset($rightMenu)
            <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0 space-x-3">
                {{ $rightMenu }}
            </div>
            @endisset
        </div>
    </div>

    @if (isset($mobileMenu) || isset($mobileMenuBottom))
        <div x-cloak x-show="$store.mobileMenu.open" x-transition:enter="duration-200 ease-out"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden z-20"
            @click.away="$store.mobileMenu.open = false">
            <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="px-5 pt-5 pb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <img class="h-8 w-auto" src="{{ asset('vendor/net2phone/images/logo.png') }}" alt="net2phone" title="net2phone">
                        </div>
                        <div class="-mr-2">
                            <button type="button"
                                class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
                                @click="$store.mobileMenu.toggle()">
                                <span class="sr-only">@lang('Close menu')</span>
                                @svg('entypo-cross', 'h-6 w-6')
                            </button>
                        </div>
                    </div>
                    <div class="mt-6">
                        <nav class="grid gap-y-4">
                            {{ $mobileMenu }}
                        </nav>
                    </div>
                </div>
                @isset($mobileMenuBottom)
                    <div class="space-y-6 py-6 px-5">
                        {{ $mobileMenuBottom }}
                    </div>
                @endisset
            </div>
        </div>
    @endif
</div>