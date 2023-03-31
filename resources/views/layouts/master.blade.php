<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {!! SEO::generate(config('htmlmin.blade')) !!}
    <link rel="shortcut icon" href="{{ url('vendor/net2phone/images/favicon.ico') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap">

    <script src="{{ url('vendor/net2phone/js/components.min.js') }}"></script>
    <script defer src="https://unpkg.com/alpinejs@3.12.0/dist/cdn.min.js"></script>
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

    <!--[if lte IE 8]> 
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script> 
    <![endif]-->
    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>

    @production
        @include('net2phone::analytics.google')
        @include('net2phone::analytics.facebook')
        @include('net2phone::analytics.linkedin')
    @endproduction

    @stack('head')
</head>

<body x-data :class="$store.mobileMenu.open ? 'overflow-hidden' : ''">

    {{ $slot }}

    @stack('footer')

</body>
</html>