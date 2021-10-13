<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description ?? null }}">
    <link rel="preconnect" href="https://assets.drivejohnsons.co.uk">
    <link rel="stylesheet" href="{{ asset(mix('/css/app.css')) }}">
    <script src="{{ asset(mix('/js/app.js')) }}" defer></script>
    {{--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ HelpCentre::gtmId() }}');</script>--}}
</head>
<body class="font-main antialiased">
{{--    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ HelpCentre::gtmId() }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>--}}
    <div class="min-h-screen bg-white dark:bg-gray-900" id="app">
        <header ref="header" class="fixed px-8 h-20 inset-x-0 top-0 flex items-center space-x-12 z-50 bg-white dark:bg-gray-800">
            <a href="{{ secure_url('/') }}" class="inline-flex items-center h-20">
                <x-logo-svg />
            </a>
            <x-search />
            <div class="flex-1 flex items-center justify-end">
                <nav class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ secure_url('/learners') }}" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out dark:text-gray-200 dark:hover:text-white">
                        Learners
                    </a>
                    <a href="{{ secure_url('/instructors') }}" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out dark:text-gray-200 dark:hover:text-white">
                        Instructors
                    </a>
                    <a href="https://www.drivejohnsons.co.uk/" class="bg-gray-100 rounded-md space-x-2 outline-none inline-flex items-center justify-center px-3 py-3 text-base text-gray-600 font-semibold hover:bg-gray-200 transition duration-150 ease-in-out dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                        </svg>
                        <span>Back to main site</span>
                    </a>
                </nav>
                <button type="button" class="w-12 h-12 bg-gray-100 rounded-md inline-flex md:hidden items-center justify-center text-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-900 transition duration-150 ease-in-out" aria-label="Toggle Menu" @click.prevent="menuOpen =! menuOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </header>

        <main class="pt-32">
            {{ $slot }}
        </main>

        <footer class="bg-gray-100 dark:bg-gray-800 py-16">
            <div class="max-w-7xl mx-auto px-8">
                <div class="md:grid md:grid-cols-4 md:gap-10">
                    <div class="mb-8 md:mb-0">
                        <div class="text-base font-medium text-gray-500 dark:text-gray-200 h-10 border-b border-gray-200 dark:border-gray-600">
                            &copy; driveJohnson's Limited, {{ date('Y') }}.
                        </div>
                        <ul class="mt-4 text-sm text-gray-400 space-y-3">
                            <li>
                                <a href="https://www.drivejohnsons.co.uk/" class="hover:text-gray-500 transition duration-150 ease-in-out">driveJohnson's Home</a>
                            </li>
                            <li>
                                <a href="https://www.drivejohnsons.co.uk/terms-conditions" class="hover:text-gray-500 transition duration-150 ease-in-out">Terms & Conditions</a>
                            </li>
                            <li>
                                <a href="https://www.drivejohnsons.co.uk/privacy" class="hover:text-gray-500 transition duration-150 ease-in-out">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="https://www.drivejohnsons.co.uk/terms-conditions" class="hover:text-gray-500 transition duration-150 ease-in-out">Join Our Franchise</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-8 md:mb-0">
                        <div class="text-base font-medium text-gray-500 dark:text-gray-200 h-10 border-b border-gray-200 dark:border-gray-600">
                            <a href="{{ secure_url('/learners') }}" class="hover:text-gray-600 transition duration-150 ease-in-out">Learners</a>
                        </div>
                        <ul class="mt-4 text-sm text-gray-400 space-y-3">
                            <li>
                                <a href="#" class="hover:text-gray-500 transition duration-150 ease-in-out">Download on App Store</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-gray-500 transition duration-150 ease-in-out">Download on Google Play</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-8 md:mb-0">
                        <div class="text-base font-medium text-gray-500 dark:text-gray-200 h-10 border-b border-gray-200 dark:border-gray-600">
                            <a href="{{ secure_url('/instructors') }}" class="hover:text-gray-600 transition duration-150 ease-in-out">Instructor Portal</a>
                        </div>
                        <ul class="mt-4 text-sm text-gray-400 space-y-3">
                            <li>
                                <a href="#" class="hover:text-gray-500 transition duration-150 ease-in-out">Download on App Store</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-gray-500 transition duration-150 ease-in-out">Download on Google Play</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="text-base font-medium text-gray-500 dark:text-gray-200 h-10 border-b border-gray-200 dark:border-gray-600">
                            Company
                        </div>
                        <ul class="mt-4 text-sm text-gray-400 space-y-3">
                            <li>
                                <a href="https://www.drivejohnsons.co.uk/about-us/" class="hover:text-gray-500 transition duration-150 ease-in-out">About Us</a>
                            </li>
                            <li>
                                <a href="https://www.drivejohnsons.co.uk/learning-centre/" class="hover:text-gray-500 transition duration-150 ease-in-out">Learning Centre</a>
                            </li>
                            <li>
                                <a href="https://www.drivejohnsons.co.uk/learners/areas-we-cover/" class="hover:text-gray-500 transition duration-150 ease-in-out">Areas We Cover</a>
                            </li>
                            <li>
                                <a href="https://www.drivejohnsons.co.uk/contact-us/" class="hover:text-gray-500 transition duration-150 ease-in-out">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <div class="fixed top-20 bg-gray-100 inset-x-0 z-50 py-5 px-8 shadow-sm" v-if="menuOpen">
            <div class="grid grid-cols-2 gap-5">
                <a href="{{ secure_url('/learners') }}" class="p-5 rounded-md bg-white text-gray-800 font-medium text-center">
                    Learners
                </a>
                <a href="{{ secure_url('/instructors') }}" class="p-5 rounded-md bg-white text-gray-800 font-medium text-center">
                    Instructors
                </a>
            </div>
            <form method="GET" action="{{ secure_url('search') }}" class="block mt-5">
                <div class="relative">
                    <input aria-label="Search" type="text" name="term" placeholder="Search our help articles..." class="w-full rounded-md shadow bg-white placeholder-gray-400 text-base px-4 py-3 pr-14 outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-1 transition duration-150 ease-in-out dark:bg-gray-700 ring-offset-transparent focus:outline-none dark:text-white" id="searchTerm">
                    <button class="absolute inset-y-1 right-1 w-12 appearance-none focus:outline-none bg-gray-50 text-gray-500 rounded inline-flex items-center justify-center overflow-hidden hover:bg-gray-900 focus:bg-gray-900 hover:text-gray-100 focus:text-gray-100 transition duration-150 ease-in-out dark:bg-gray-800 dark:text-gray-100 dark:focus:text-white" aria-label="Search">
                        <svg aria-label="Magnifying Glass Icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
