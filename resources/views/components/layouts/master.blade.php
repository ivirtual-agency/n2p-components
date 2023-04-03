<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('vendor/net2phone/images/favicon.ico') }}">
    
    {{-- CSS --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap">

    {{-- JS --}}
    <script src="{{ url('vendor/net2phone/js/components.min.js') }}"></script>
    @stack('alpinjs')
    <script defer src="https://unpkg.com/alpinejs@3.12.0/dist/cdn.min.js"></script>

    @production
        @include('net2phone::analytics.hubspot')
        @include('net2phone::analytics.google')
        @include('net2phone::analytics.facebook')
        @include('net2phone::analytics.linkedin')
    @endproduction
    
    {{-- SEO --}}
    {!! SEO::generate(App::isProduction()) !!}

    @stack('head')
</head>

<body>

    @isset ($header)
        <header>
            {{ $header }}
        </header>
    @endisset

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-secondary" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">@lang('Footer')</h2>
        <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:py-16 lg:px-8 text-center md:text-left">
    
            @isset($footer)
                <div class="pb-8">
                    {{ $footer }}
                </div>
            @endisset
    
            <div class="md:flex md:items-end md:justify-between space-y-8 md:space-y-0 @isset($footer)mt-8 pt-8 border-t border-gray-700 @endisset">
                
                <x-n2p::ui.social-media-icons class="md:order-1" />
    
                <div class="md:order-3">
    
                    <h3 class="text-center md:text-left text-base font-medium text-white">
                        @lang('International Webs')
                    </h3>
    
                    <div class="mt-4 flex justify-center md:justify-start space-x-3">
    
                        @foreach ($internationalSites as $key => $site)
                            @if (config('net2phone.hidden_international_site') !== $key)
                                <a href="{{ $site['url'] }}" target="_blank">
                                    <img class="h-8 w-auto hover:scale-125" loading="lazy"
                                        src="{{ url("vendor/net2phone/images/flags/$key.png") }}" 
                                        alt="net2phone - {{ $site['name'] }}" title="net2phone - {{ $site['name'] }}">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
    
                <p class="mt-8 text-base text-gray-400 md:order-2 md:mt-0 text-center">
                    &copy; {{ date('Y') }} net2phone. @lang('All rights reserved.')
                </p>
            </div>
        </div>
    </footer>

    {{-- Footer Scripts --}}
    @stack('scripts')
</body>
</html>