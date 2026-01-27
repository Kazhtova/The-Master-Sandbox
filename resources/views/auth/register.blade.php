<x-auth-layout>
    <x-slot:title>
        Register Page
    </x-slot:title>

    <div class="min-h-screen flex items-center justify-center p-4 bg-linear-to-br from-gray-100 to-gray-200 dark:from-neutral-900 dark:to-neutral-800">
        
        <div class="w-full max-w-5xl bg-white dark:bg-neutral-800 rounded-3xl shadow-2xl overflow-hidden flex flex-col lg:flex-row">
            
            <div class="w-full lg:w-1/2 p-8 md:p-12 flex flex-col justify-center relative">
                
                <div class="mb-8 text-center lg:text-left">
                    <div class="inline-block p-3 rounded-full bg-purple-50 dark:bg-neutral-700 mb-4">
                        <svg class="w-8 h-8 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">Create Account</h2>
                    <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Join us and start your journey today.</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Full Name</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                            class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="John Doe">
                        @error('nama')
                            <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                            class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="name@company.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password</label>
                            <input type="password" name="password" id="password" 
                                class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                                placeholder="••••••••">
                            @error('password')
                                <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-purple-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:ring-offset-gray-800">
                        </div>
                        <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-purple-600 hover:underline dark:text-purple-500">Terms and Conditions</a></label>
                    </div>

                    <button type="submit" 
                        class="w-full py-3.5 px-6 rounded-xl bg-linear-to-r from-purple-700 to-indigo-800 text-white font-semibold text-sm shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:scale-[1.01] active:scale-[0.98] transition-all duration-200 uppercase tracking-wider mt-4">
                        Create Account
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Already have an account? 
                        <a href="{{ route('auth.login') }}" class="font-semibold text-purple-600 hover:text-purple-500 transition duration-150">
                            Log in here
                        </a>
                    </p>
                </div>
            </div>

            <div class="hidden lg:flex w-1/2 bg-cover bg-center relative overflow-hidden" 
                 style="background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926?q=80&w=2629&auto=format&fit=crop');">
                
                <div class="absolute inset-0 bg-linear-to-br from-purple-900/90 via-indigo-900/60 to-black/40 mix-blend-multiply"></div>
                <div class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent"></div>

                <div class="relative z-10 w-full h-full flex flex-col justify-end p-16 text-white">
                    <div class="backdrop-blur-sm bg-white/5 border border-white/10 p-8 rounded-2xl shadow-2xl">
                        <h2 class="text-3xl font-bold leading-tight mb-4">
                            You Visit My Website.
                        </h2>
                        <p class="text-gray-200 font-light leading-relaxed mb-6 opacity-90">
                            "I introduce this website as my personal project or portfolio."
                        </p>
                        
                        <div class="flex gap-4">
                            <div class="flex flex-col">
                                <span class="text-2xl font-bold">10k+</span>
                                <span class="text-xs text-gray-300 uppercase tracking-wide">Users</span>
                            </div>
                            <div class="w-px bg-white/20"></div>
                            <div class="flex flex-col">
                                <span class="text-2xl font-bold">99%</span>
                                <span class="text-xs text-gray-300 uppercase tracking-wide">Uptime</span>
                            </div>
                            <div class="w-px bg-white/20"></div>
                            <div class="flex flex-col">
                                <span class="text-2xl font-bold">24/7</span>
                                <span class="text-xs text-gray-300 uppercase tracking-wide">Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-auth-layout>