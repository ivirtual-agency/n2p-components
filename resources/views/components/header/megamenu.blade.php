@props(['grid-cols' => 'grid-cols-1', 'size' => 'max-w-md'])

<div class="relative" x-data="Components.popover({ open: false, focus: false })" x-init="init()"
    @keydown.escape="onEscape" @close-popover-group.window="onClosePopoverGroup">

    <button type="button" x-state:on="@lang('Item active')" x-state:off="@lang('Item inactive')"
        class="group inline-flex items-center rounded-md bg-white text-base font-medium hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
        :class="{ 'text-primary': open, 'text-gray-500': !(open) }" @click="toggle"
        @mousedown="if (open) $event.preventDefault()" aria-expanded="true" :aria-expanded="open.toString()">
        
        <span class="uppercase">{{ $title }}</span>
        @svg('entypo-chevron-down', 'ml-1 h-5 w-5 group-hover:text-primary text-gray-600', [
            ':class' => '{ \'text-primary\': open, \'text-gray-600\': !(open) }'
        ])
    </button>

    <div x-cloak x-show="open" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1" 
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" 
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute z-10 -ml-4 mt-3 w-screen {{ $size }} transform px-2 sm:px-0 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2"
        x-ref="panel" @click.away="open = false">
        <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 {{ ${'grid-cols'} }}">
                {{ $slot }}
            </div>

            @isset($button)
                <div class="space-y-6 bg-gray-50 px-5 py-5 sm:flex sm:px-8">
                    <div class="flex-1">
                        <a class="-m-3 flex items-center rounded-md p-3 text-base font-medium text-gray-900 hover:bg-gray-100"
                            href="{{ route($button->attributes->get('route')) }}">

                            @svg($button->attributes->get('icon'), 'h-5 w-5 flex-shrink-0 text-gray-400')

                            <span class="ml-3">
                                {{ $button }}
                            </span>
                        </a>
                    </div>
                </div>
            @endisset
        </div>
    </div>
</div>