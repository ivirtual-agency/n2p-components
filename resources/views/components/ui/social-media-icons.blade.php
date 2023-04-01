@props(['color' => 'text-gray-400 hover:text-gray-200'])

<div {{ $attributes
    ->except('color')
    ->merge(['class' => 'flex justify-center md:justify-start space-x-6 md:order-1'])
}}>

    @if (config('net2phone.social.linkedin_url'))
        <a href="{{ config('net2phone.social.linkedin_url') }}" target="_blank"
            class="{{ $color }} hover:scale-125">
            <span class="sr-only">LinkedIn</span>
            @svg('entypo-linkedin-with-circle', 'h-6 w-6')
        </a>
    @endif

    @if (config('net2phone.social.facebook_url'))
        <a href="{{ config('net2phone.social.facebook_url') }}" target="_blank"
            class="{{ $color }} hover:scale-125">
            <span class="sr-only">Facebook</span>
            @svg('entypo-facebook-with-circle', 'h-6 w-6')
        </a>
    @endif

    @if (config('net2phone.social.twitter.url'))
        <a href="{{ config('net2phone.social.twitter.url') }}" target="_blank"
            class="{{ $color }} hover:scale-125">
            <span class="sr-only">Twitter</span>
            @svg('entypo-twitter-with-circle', 'h-6 w-6')
        </a>
    @endif

    @if (config('net2phone.social.youtube_url'))
        <a href="{{ config('net2phone.social.youtube_url') }}" target="_blank"
            class="{{ $color }} hover:scale-125">
            <span class="sr-only">Youtube</span>
            @svg('entypo-youtube-with-circle', 'h-6 w-6')
        </a>
    @endif

    @if (config('net2phone.social.instagram_url'))
        <a href="{{ config('net2phone.social.instagram_url') }}" target="_blank"
            class="{{ $color }} hover:scale-125">
            <span class="sr-only">Instagram</span>
            @svg('entypo-instagram-with-circle', 'h-6 w-6')
        </a>
    @endif
</div>