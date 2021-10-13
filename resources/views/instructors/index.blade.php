<x-layouts.main :title="HelpCentre::title('Instructor Portal')">
    <section class="pt-10 pb-16 border-b border-gray-100">
        <div class="max-w-7xl px-8 mx-auto">
            <div class="md:flex md:items-center md:space-x-16">
                <div class="w-32 h-32 md:w-40 md:h-40 flex-shrink-0 rounded-md overflow-hidden relative">
                    <picture>
                        <source srcset="{{ HelpCentre::instructorsIcon('webp') }}" type="image/webp">
                        <source srcset="{{ HelpCentre::instructorsIcon('jpg') }}" type="image/jpeg">
                        <img src="{{ HelpCentre::instructorsIcon('jpg') }}" alt="driveJohnson's Learners Icon" class="min-w-full min-h-full object-cover object-center" width="160" height="160">
                    </picture>
                </div>
                <div class="mt-10 md:mt-0 md:flex-1">
                    <h1 class="text-4xl sm:text-6xl font-bold text-gray-900">
                        Instructor Portal Help
                    </h1>
                    <div class="mt-3">
                        <p class="text-2xl font-medium text-gray-500">
                            Help and support with the Instructor Portal app for driveJohnson's driving instructors.
                        </p>
                    </div>
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
