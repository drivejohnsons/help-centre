<x-layouts.main :title="HelpCentre::title($tag->label)">
    <section class="pt-10 pb-16 border-b border-gray-100">
        <div class="max-w-7xl px-8 mx-auto">
            <div class="md:flex md:items-center md:space-x-16">
                <div class="mt-10 md:mt-0 md:flex-1">
                    <h1 class="text-4xl sm:text-6xl font-medium text-gray-600">
                        Articles tagged as <strong class="text-gray-900">{{ $tag->label }}</strong>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-10 pb-16">
        <div class="max-w-7xl mx-auto px-8">
            <div class="grid grid-cols-3 gap-6">
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
