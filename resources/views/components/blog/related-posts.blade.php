@if ($post->relatedPosts()->exists())
    <div class="mt-20">
        <h3 class="mb-3 text-xl font-semibold text-gray-900 text-center">
            @lang('Related posts')
        </h3>

        <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
            @foreach ($post->relatedPosts()->take(3)->get() as $post)
                <x-n2p::blog.post :post="$post" />
            @endforeach
        </div>
    </div>
@endif