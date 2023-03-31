<script async src="https://www.googletagmanager.com/gtag/js?id=G-EWQ8HJHTRW"></script>

<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-EWQ8HJHTRW'); {{-- Google Analytics - All Websites --}}

    @foreach(collect(config('net2phone.google_tracking_ids'))->filter() as $trackingId)
        gtag('config', '{{ $trackingId }}');
    @endforeach
</script>
