<script async src="https://www.googletagmanager.com/gtag/js?id={{ config('net2phone.google.global_id') }}"></script>

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ config('net2phone.google.global_id') }}'); {{-- Google Analytics - All Websites --}}

    @foreach(collect(config('net2phone.google.tracking_ids'))->filter() as $trackingId)
        gtag('config', '{{ $trackingId }}');
    @endforeach
</script>
