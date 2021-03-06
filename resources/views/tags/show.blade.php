<x-layouts.main :title="HelpCentre::title('Tag: ' . $tag->label)" :description="$tag->description">
    <section class="pt-10 pb-16 border-b border-gray-100">
        <div class="max-w-7xl px-8 mx-auto">
            <div class="md:flex md:items-center md:space-x-16">
                <div class="mt-10 md:mt-0 md:flex-1">
                    <h1 class="text-3xl sm:text-4xl font-medium text-gray-500">
                        <span class="block">Articles tagged as</span>
                        <strong class="block text-gray-900 text-5xl sm:text-6xl">{{ $tag->label }}</strong>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-10 pb-16">
        <div class="max-w-7xl mx-auto px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                @foreach($articles as $article)
                    <x-article-card :article="$article" />
                @endforeach
            </div>
            <div class="mt-6 flex items-center justify-center">
                {!! $articles->links() !!}
            </div>
        </div>
    </section>
</x-layouts.main>
