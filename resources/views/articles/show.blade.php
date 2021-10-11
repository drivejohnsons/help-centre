<x-layouts.main :title="HelpCentre::title($article->title)" :description="$article->seo_description">
    <div class="px-8 pb-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-gray-900">
                {{ $article->title }}
            </h1>
            <div class="text-lg text-gray-500 mt-5">
                <p class="leading-relaxed">{{ $article->excerpt }}</p>
            </div>
            <div class="flex items-center space-x-4 mt-5">
                @if($article->hasLoadedTags())
                <div class="flex items-center space-x-2">
                    @foreach($article->tags as $tag)
                        <a href="{{ $tag->url }}" class="inline-flex px-2 py-1 bg-gray-800 text-white font-medium text-sm rounded-md">
                            {{ $tag->label }}
                        </a>
                    @endforeach
                </div>
                @endif
                <div class="text-gray-400 text-base inline-flex items-center space-x-2 font-medium">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="sr-only">Published</span>
                    <span>{{ $article->published_at->format('jS F Y') }}</span>
                </div>
            </div>
        </div>

        @if($article->hasVideo())
        <div class="max-w-5xl mx-auto bg-gray-500 mt-10 rounded-md overflow-hidden">
            <x-youtube link="{{ $article->video_url }}" />
        </div>
        @endif

        @if($article->hasContent())
        <div class="max-w-3xl mx-auto text-lg mt-16 prose prose-red prose-lg text-gray-500">
            {!! $article->markdown_content !!}
        </div>
        @endif

        <div class="max-w-3xl mx-auto mt-16 text-gray-300 text-sm">
            Last updated: {{ $article->updated_at->format('jS F Y H:i') }}
        </div>
    </div>
</x-layouts.main>
