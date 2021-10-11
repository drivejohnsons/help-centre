<template>
    <div class="relative">
        <div class="relative z-20">
            <input aria-label="Search" type="text" name="term" placeholder="Search our help articles..." class="w-full rounded-md shadow bg-white placeholder-gray-400 text-base px-4 py-3 pr-14 outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-1 transition duration-150 ease-in-out dark:bg-gray-700 ring-offset-transparent focus:outline-none dark:text-white" id="searchTerm" @input="e => search(e.target.value)">
            <button class="absolute inset-y-1 right-1 w-12 appearance-none focus:outline-none bg-gray-50 text-gray-500 rounded inline-flex items-center justify-center overflow-hidden hover:bg-gray-900 focus:bg-gray-900 hover:text-gray-100 focus:text-gray-100 transition duration-150 ease-in-out dark:bg-gray-800 dark:text-gray-100 dark:focus:text-white disabled:bg-gray-200 disabled:cursor-not-allowed" :disabled="searching" aria-label="Search">
                <svg aria-label="Magnifying Glass Icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="searching ? 'spin' : ''">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" v-if="! searching" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" v-else />
                </svg>
            </button>
        </div>
        <div class="absolute top-full inset-x-0 bg-gray-50 shadow-md border border-gray-200 rounded-b-md overflow-hidden z-10" v-if="results.length && query">
            <a :href="article.url" class="flex items-center space-x-3 py-4 px-4 hover:bg-gray-100 focus:ring-2 focus:ring-gray-900 transition duration-150 ease-in-out" v-for="article in results" :key="article.id">
                <span class="flex-1 text-sm">
                    {{ article.title }}
                </span>
                <span class="bg-gray-800 text-sm text-white font-medium rounded-md px-2 py-1 inline-flex items-center justify-center" v-if="article.tags.length">
                    {{ article.tags[0].label }}
                </span>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    name: "Search",
    data() {
        return {
            query: null,
            timer: null,
            results: [],
            searching: false,
        }
    },
    methods: {
        search(value) {
            this.query = value

            if(! value) {
                this.results = []
                return
            }

            clearTimeout(this.timer)
            this.timer = null
            this.results = []

            this.timer = setTimeout(() => this.searchRequest(value), 600)
        },
        searchRequest(query) {
            this.searching = true

            axios
                .get('/help/search', {
                    params: { query }
                })
                .then(response => this.results = response.data.data)
                .catch(() => this.results = [])
                .finally(() => this.searching = false)
        }
    }
}
</script>
<style lang="css">
@keyframes spin {
    from {
        transform: rotate(0);
    }
    to {
        transform: rotate(360deg);
    }
}
.spin {
    animation: spin 1s infinite;
}
</style>
