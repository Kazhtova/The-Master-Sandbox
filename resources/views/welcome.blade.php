<x-layout>
    <div class="min-h-screen bg-gray-50 font-sans">

        <div class="relative bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                        <polygon points="50,0 100,0 50,100 0,100" />
                    </svg>

                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                <span class="block xl:inline">Welcome to</span>
                                <span class="block text-purple-600 xl:inline">KazFolyo</span>
                            </h1>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                A modern and efficient Book Release Management System. Easily manage book and member data in one integrated platform. Increase your library's productivity today.
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <a href="{{ route('siswa.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 md:py-4 md:text-lg md:px-10 transition duration-150 ease-in-out">
                                        Manage members
                                    </a>
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <a href="{{ route('buku.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-purple-700 bg-purple-100 hover:bg-purple-200 md:py-4 md:text-lg md:px-10 transition duration-150 ease-in-out">
                                        Manage data
                                    </a>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Perpustakaan">
            </div>
        </div>

        <div class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center mb-10">
                    <h2 class="text-base text-purple-600 font-semibold tracking-wide uppercase">Data Summary</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Library Statistics
                    </p>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        Monitor the growth of your library's collection and members in real-time.
                    </p>
                </div>

                <div class="mt-10">
                    <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                        <div class="relative bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-purple-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Total Book Collection</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-4xl font-extrabold text-purple-600">
                                1,250
                            </dd>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Book titles available
                            </dd>
                        </div>

                        <div class="relative bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-purple-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Registered Member</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-4xl font-extrabold text-purple-600">
                                450
                            </dd>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Active students
                            </dd>
                        </div>

                        <div class="relative bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                            <dt>
                                <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-purple-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <p class="ml-16 text-lg leading-6 font-medium text-gray-900">This Month's Activities</p>
                            </dt>
                            <dd class="mt-2 ml-16 text-4xl font-extrabold text-purple-600">
                                320
                            </dd>
                            <dd class="mt-2 ml-16 text-base text-gray-500">
                                Lending transactions
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

        <div class="bg-white border-t border-gray-200 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left">
                    <p class="text-base text-gray-400">&copy; {{ date('Y') }} KazFolyo.</p>
                </div>
                <div class="flex space-x-6 mt-4 md:mt-0 justify-center md:justify-end">
                    <a href="#" class="text-gray-400 hover:text-purple-500">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-purple-500">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.733.01 3.692.054 1.069.049 1.96.23 2.646.496.707.272 1.307.687 1.908 1.288.601.601 1.016 1.2 1.288 1.908.266.686.447 1.577.496 2.646.044.959.054 1.262.054 3.692 0 2.43-.01 2.733-.054 3.692-.049 1.069-.23 1.96-.496 2.646-.272.707-.687 1.307-1.288 1.908-.601.601-1.2 1.016-1.908 1.288-.686.266-1.577.447-2.646.496-.959.044-1.262.054-3.692.054-2.43 0-2.733-.01-3.692-.054-1.069-.049-1.96-.23-2.646-.496-.707-.272-1.307-.687-1.908-1.288-.601-.601-1.016-1.2-1.288-1.908-.266-.686-.447-1.577-.496-2.646-.044-.959-.054-1.262-.054-3.692 0-2.43.01-2.733.054-3.692.049-1.069.23-1.96.496-2.646.272-.707.687-1.307-1.288-1.908-.601-.601-1.2-1.016-1.908-1.288-.686-.266-1.577-.447-2.646-.496-.959-.044-1.262-.054-3.692-.054zm0-2c-2.493 0-2.79.01-3.79.056-1.19.054-2.198.262-3.075.602-1.128.438-2.085 1.184-2.884 1.983-.799.799-1.545 1.756-1.983 2.884-.34.877-.548 1.885-.602 3.075C2.01 8.525 2 8.822 2 11.315v1.37c0 2.493.01 2.79.056 3.79.054 1.19.262 2.198.602 3.075.438 1.128 1.184 2.085 1.983 2.884.799.799 1.756 1.545 2.884 1.983.877.34 1.885.548 3.075.602.999.046 1.296.056 3.79.056h1.37c2.493 0 2.79-.01 3.79-.056 1.19-.054 2.198-.262 3.075-.602 1.128-.438 2.085-1.184 2.884-1.983.799-.799 1.545-1.756 1.983-2.884.34-.877.548-1.885.602-3.075.046-.999.056-1.296.056-3.79v-1.37c0-2.493-.01-2.79-.056-3.79-.054-1.19-.262-2.198-.602-3.075-.438-1.128-1.184-2.085-1.983-2.884-.799-.799-1.756-1.545-2.884-1.983-.877-.34-1.885-.548-3.075-.602-.999-.046-1.296-.056-3.79-.056h-1.37zm-1.37 6c3.532 0 6.37 2.838 6.37 6.37s-2.838 6.37-6.37 6.37-6.37-2.838-6.37-6.37 2.838-6.37 6.37-6.37zm0 2c-2.412 0-4.37 1.958-4.37 4.37s1.958 4.37 4.37 4.37 4.37-1.958 4.37-4.37-1.958-4.37-4.37-4.37zm7.048-2.884c0 .642-.52 1.162-1.162 1.162-.642 0-1.162-.52-1.162-1.162 0-.642.52-1.162 1.162-1.162.642 0 1.162.52 1.162 1.162z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-purple-500">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.236 8.236 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
  
</x-layout> 