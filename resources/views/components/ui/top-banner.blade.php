<div class="relative bg-banner">
    <div class="mx-auto max-w-7xl py-3 px-3 sm:px-6 lg:px-8 flex justify-center sm:justify-between">
        <div class="flex justify-start space-x-4">
            @isset($left)
                {{ $left }}
            @endisset
        </div>

        <div class="hidden sm:flex justify-end space-x-4">
            @isset($right)
                {{ $right }}
            @endisset
        </div>
    </div>
</div>