@props(['post'])

<div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
    <div class="flex-shrink-0">
        <a href="{{ route(config('net2phone.blog.routes.post'), [$post]) }}">
            <img class="h-48 w-full object-cover" loading="lazy" src="{{ Storage::url($post->feature_image) }}" alt="{{ $post->name }}"
                title="{{ $post->name }}">
        </a>
    </div>
    <div class="flex flex-1 flex-col justify-between bg-white p-6">
        <div class="flex-1">

            @if ($post->category) 
                @if (config('net2phone.blog.routes.category'))
                        <a href="{{ route(config('net2phone.blog.routes.category'), [$post->category]) }}" 
                            class="text-sm font-medium text-primary hover:text-secondary hover:underline">
                            {{ $post->category->name }}
                        </a>
                @else
                    <p class="text-sm font-medium text-primary">
                        {{ $post->category->name }}
                    </p>
                @endif
            @endif
            
            <a href="{{ route(config('net2phone.blog.routes.post'), [$post]) }}" class="mt-2 block">
                <p class="text-xl font-semibold text-gray-900 hover:text-primary">{{ $post->name }}</p>
                <p class="mt-3 text-base text-gray-500">
                    {{ $post->short_description }}
                </p>
            </a>
        </div>
    </div>
</div>