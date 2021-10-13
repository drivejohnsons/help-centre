<a href="{{ $article->url ?? '#' }}" class="mb-6 md:mb-0 last:mb-0 block text-left rounded-md overflow-hidden hover:ring-4 hover:ring-gray-900 hover:ring-offset-1 transition duration-150 ease-in-out">
    <div class="h-52 bg-gray-100 dark:bg-gray-700 relative w-full overflow-hidden">
        <img loading="lazy" src="{{ $article->cover_image_url }}" alt="{{ $article->title }}" class="object-cover object-center min-h-full min-w-full" height="500" width="281">
    </div>
    <div class="p-3 bg-white dark:bg-gray-800">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            {{ $article->title }}
        </h3>
        @if($article->hasLoadedTags())
        <div class="mt-3 flex items-center space-x-3">
            @foreach($article->tags as $tag)
                <span class="inline-flex px-2 py-1 bg-gray-800 text-white text-sm rounded-md font-medium">
                    {{ $tag->label }}
                </span>
            @endforeach
        </div>
        @endif
    </div>
</a>
