<button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center whitespace-nowrap rounded-full border px-4 py-2 text-base font-medium shadow-sm ease-in-out duration-150 hover:scale-105']) }}>
    {{ $slot }}
</button>