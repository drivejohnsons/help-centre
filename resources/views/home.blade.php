<x-layouts.main :title="HelpCentre::title('Home')">
    <section class="border-b border-gray-200 dark:border-gray-600">
        <div class="hero pb-10 md:pt-20 md:pb-32 px-8 max-w-7xl mx-auto">
            <div class="flex flex-wrap md:flex-no-wrap md:items-center md:space-x-16">
                <div class="w-full md:w-3/5 md:pr-16">
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white">
                        How can we help you?
                    </h1>
                    <p class="mt-5 text-gray-500 dark:text-gray-300 text-xl md:text-3xl font-semibold leading-relaxed">
                        We've compiled some how-to guides, videos and articles to help you with the apps and services we provide.
                    </p>
                </div>
                <div class="mt-5 md:mt-0 w-full md:w-auto md:flex-1 flex items-center justify-end">
                    <picture>
                        <source srcset="{{ asset('/images/mini-countryman-model.webp') }}" type="image/webp">
                        <source srcset="{{ asset('/images/mini-countryman-model-tiny.png') }}" type="image/png">
                        <img src="{{ asset('/images/mini-countryman-model-tiny.png') }}" alt="Mini Countryman Model" class="w-full h-auto" loading="lazy">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 md:py-16">
        <div class="mx-auto max-w-7xl">
            <div class="md:grid md:grid-cols-2 md:gap-10 px-8">
                <a href="{{ secure_url('/learners') }}" class="w-full px-4 bg-gray-50 dark:bg-gray-800 h-32 rounded-md inline-flex items-center justify-start transition duration-150 ease-in-out hover:ring-4 hover:ring-gray-900 hover:ring-offset-1">
                    <span class="flex items-center space-x-6">
                        <img src="{{ HelpCentre::learnersIcon() }}"
                             alt="driveJohnson's Learners Icon"
                             class="w-20 h-20 rounded-md"
                             width="80"
                             height="80"
                             loading="lazy">
                        <span class="flex-1 flex items-center space-x-2 text-left">
                            <span class="text-gray-500 dark:text-gray-300 block text-3xl">
                                For
                            </span>
                            <span class="text-red-600 text-4xl font-bold">
                                Learners
                            </span>
                        </span>
                    </span>
                </a>

                <a href="{{ secure_url('/instructors') }}" class="w-full mt-4 md:mt-0 px-4 bg-gray-50 dark:bg-gray-800 h-32 rounded-md inline-flex items-center justify-start transition duration-150 ease-in-out hover:ring-4 hover:ring-gray-900 hover:ring-offset-1">
                    <span class="flex items-center space-x-6">
                        <img src="{{ HelpCentre::instructorsIcon() }}"
                             alt="driveJohnson's Instructor Portal Icon"
                             class="w-20 h-20 rounded-md"
                             width="80"
                             height="80"
                             loading="lazy">
                        <span class="flex-1 flex items-center space-x-2 text-left">
                            <span class="text-gray-500 dark:text-gray-300 block text-3xl">
                                For
                            </span>
                            <span class="text-red-600 text-4xl font-bold">
                                Instructors
                            </span>
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </section>
    <section class="py-16 border-t border-gray-200 dark:border-gray-600">
        <div class="mx-auto max-w-7xl px-8 text-center">
            <h2 class="font-bold text-4xl text-gray-900 dark:text-white">Most recent help articles</h2>

            <div class="md:grid md:grid-cols-3 md:gap-8 mt-10">
                @foreach($latest as $article)
                <x-article-card :article="$article" />
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.main>
