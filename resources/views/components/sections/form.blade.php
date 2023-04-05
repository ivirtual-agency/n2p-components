@props(['bg' => 'bg-white'])

<x-n2p::ui.section id="contact">
    <div class="grid grid-cols-1 lg:grid-cols-3 rounded-xl shadow-xl">
        <div class="py-10 px-6 sm:px-10 xl:p-12 bg-contact rounded-l-xl">

            <h3 class="text-lg font-medium text-white">
                @lang('Contact us')
            </h3>

            {{ $slot }}

            <div class="mt-4">
                <x-n2p::ui.social-media-icons color="text-gray-200 hover:text-white" />
            </div>
        </div>

        <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12 rounded-r-xl {{ $bg }}">
            @isset($form)
                {{ $form }}
            @else
                <x-n2p::ui.form />
            @endisset
        </div>
    </div>
</x-n2p::ui.section>