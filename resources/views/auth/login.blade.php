<x-auth-layout>
    <x-slot:title>
        Login Page
    </x-slot:title>

    <div class="min-h-screen flex items-center justify-center p-4 bg-linear-to-br from-gray-100 to-gray-200 dark:from-neutral-900 dark:to-neutral-800">
        
        <div class="w-full max-w-5xl bg-white dark:bg-neutral-800 rounded-3xl shadow-2xl overflow-hidden flex flex-col lg:flex-row">
            
            <div class="w-full lg:w-1/2 p-8 md:p-12 lg:p-16 flex flex-col justify-center relative">
                
                <div class="mb-10 text-center lg:text-left">
                    <div class="inline-block p-3 rounded-full bg-purple-50 dark:bg-neutral-700 mb-4">
                        <svg class="w-10 h-10 text-purple-700" viewBox="0 0 896 896" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M448 881.3c-239.4 0-433.4-194-433.4-433.3S208.6 14.7 448 14.7s433.4 194 433.4 433.3-194 433.3-433.4 433.3z" opacity="0.1"/>
                            <path fill="#6b21a8" d="M661.2 613.1 401.1 738c-1.6.8-3.4 1.2-5.2 1.2-2.2 0-4.4-.6-6.4-1.8-3.5-2.2-5.6-6-5.6-10.2V603.5l-140.5-58.8c-4.5-1.9-7.4-6.2-7.4-11.1V208.8c0-4.1 2.1-8 5.6-10.2s7.9-2.4 11.6-.7l270.4 129.8 127.3-61.1c3.7-1.8 8.1-1.5 11.6.7s5.6 6 5.6 10.2v324.8c-.1 4.6-2.7 8.8-6.9 10.8z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">Welcome Back</h2>
                    <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">Please enter your details to sign in.</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                            class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="name@company.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        </div>
                        <input type="password" name="password" id="password" 
                            class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 dark:bg-neutral-700 dark:border-neutral-600 dark:text-white"
                            placeholder="••••••••">
                        @error('password')
                            <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" 
                        class="w-full py-3.5 px-6 rounded-xl bg-linear-to-r from-purple-700 to-indigo-800 text-white font-semibold text-sm shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:scale-[1.01] active:scale-[0.98] transition-all duration-200 uppercase tracking-wider">
                        Sign In
                    </button>
                </form>

                <div class="mt-10 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Don't have an account? 
                        <a href="{{ route('auth.register') }}" class="font-semibold text-purple-600 hover:text-purple-500 transition duration-150">
                            Create an account
                        </a>
                    </p>
                </div>
            </div>

            <div class="hidden lg:flex w-1/2 bg-cover bg-center relative overflow-hidden" 
                 style="background-image: url('https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?q=80&w=2564&auto=format&fit=crop');">
                
                <div class="absolute inset-0 bg-linear-to-t from-purple-900/90 via-purple-900/50 to-transparent mix-blend-multiply"></div>
                <div class="absolute inset-0 bg-linear-to-br from-indigo-900/40 to-black/60"></div>

                <div class="relative z-10 w-full h-full flex flex-col justify-end p-16 text-white">
                    <div class="mb-6">
                        <div class="h-1 w-12 bg-purple-400 mb-6 rounded-full"></div>
                        <h2 class="text-4xl font-bold leading-tight mb-4 text-shadow">
                            I am more <br/>than just code.
                        </h2>
                        <p class="text-lg text-gray-200 font-light leading-relaxed opacity-90">
                            "Combining technical logic with visual aesthetics to create a real impact."
                        </p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 mt-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-white">Project Laravel Kashka</p>
                                <p class="text-xs text-purple-200">Verified System</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-auth-layout>