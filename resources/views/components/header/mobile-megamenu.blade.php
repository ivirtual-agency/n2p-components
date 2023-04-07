<div x-data="{ open: false }" class="-mx-3">
    <button type="button"
        class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base leading-7 hover:bg-gray-50"
        aria-controls="disclosure-1" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">

        {{ $title }}

        @svg('entypo-chevron-down', 'h-5 w-5 flex-none', [':class' => '{ \'rotate-180\': open }'])
    </button>
    <div class="space-y-2 pl-4 pt-4" x-cloak x-show="open">
        {{ $slot }}
    </div>
</div>