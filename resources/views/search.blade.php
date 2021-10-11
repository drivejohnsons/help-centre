<x-layouts.main :title="$title" :description="'Search results for the searched term: ' . $term">
    <div class="px-8 pb-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl md:text-4xl font-bold text-gray-900">
                Search results for <span class="w-full block md:inline md:w-auto text-red-700 underline">'{{ $term }}'</span>
            </h1>
            <div class="mt-4 text-base">
                <span class="text-gray-500">{{ $articles->total() }} results found</span>
            </div>

            <div class="mt-8 pt-8 md:space-y-6 border-t border-gray-200">
                @forelse($articles as $article)
                <x-article-search :article="$article"  />
                @empty
                <p class="text-lg text-gray-400">Nothing was found.</p>
                @endforelse
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                {!! $articles->links() !!}
            </div>
        </div>
    </div>
</x-layouts.main>
