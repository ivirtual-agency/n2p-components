@props(['post'])

@if ($post->tags()->exists())
    <div class="mt-8">
        <h3 class="mb-3 text-xl font-semibold text-gray-900">
            @lang('Tags')
        </h3>

        @if (config('net2phone.blog.routes.tag'))
            <div>
                @foreach ($post->tags as $tag)
                    <a href="{{ route(config('net2phone.blog.routes.tag'), [$tag]) }}"
                        class="inline-flex items-center rounded-md bg-primary px-4 py-1 text-md font-medium text-white border border-primary hover:bg-white hover:text-primary">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        @else
            <div>
                @foreach ($post->tags as $tag)
                    <div class="inline-flex items-center rounded-md bg-primary px-4 py-1 text-md font-medium text-white">
                        {{ $tag->name }}
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endif