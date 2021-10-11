<div class="w-1/3">
    <form method="GET" action="{{ secure_url('search') }}" class="hidden md:block">
        <v-search>
            <div class="relative">
                <input aria-label="Search" type="text" name="term" placeholder="Search our help articles..." class="w-full rounded-md shadow bg-white placeholder-gray-400 text-base px-4 py-3 pr-14 outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-1 transition duration-150 ease-in-out dark:bg-gray-700 ring-offset-transparent focus:outline-none dark:text-white" id="searchTerm">
                <button class="absolute inset-y-1 right-1 w-12 appearance-none focus:outline-none bg-gray-50 text-gray-500 rounded inline-flex items-center justify-center overflow-hidden hover:bg-gray-900 focus:bg-gray-900 hover:text-gray-100 focus:text-gray-100 transition duration-150 ease-in-out dark:bg-gray-800 dark:text-gray-100 dark:focus:text-white" aria-label="Search">
                    <svg aria-label="Magnifying Glass Icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </v-search>
    </form>
</div>
