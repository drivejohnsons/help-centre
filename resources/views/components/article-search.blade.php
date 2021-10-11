<article class="mb-10 md:mb-0 md:flex w-full md:items-start md:space-x-6">
    <a class="rounded-md overflow-hidden bg-gray-100 md:w-64 relative block flex-shrink-0" href="{{ $article->url }}">
        <img src="{{ $article->cover_image_url }}" alt="{{ $article->title }}" class="min-w-full min-h-full object-cover object-center">
    </a>
    <div class="mt-3 md:mt-0 md:flex-1 flex items-center">
        <div>
            <h3 class="font-bold text-gray-900 text-xl">
                <a href="{{ $article->url }}" class="hover:text-gray-600 transition duration-150 ease-in-out">
                    {{ $article->title }}
                </a>
            </h3>
            <div class="overflow-ellipsis overflow-hidden w-full">
                {{ $article->excerpt }}
            </div>
            <div class="mt-2 space-x-2 flex items-center">
                @foreach($article->tags as $tag)
                    <span class="inline-flex px-2 py-1 bg-gray-900 text-white text-xs font-medium rounded-md">
                        {{ $tag->label }}
                    </span>
                @endforeach
            </div>
        </div>
    </div>
</article>
