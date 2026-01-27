<x-layout>
    <div class="min-h-screen flex items-center justify-center py-10 px-4">
        
        <div class="w-full max-w-4xl bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
            
            <div class="relative h-32 bg-linear-to-r from-gray-800 to-gray-900">
                <div class="absolute -bottom-12 left-8">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full border-4 border-white bg-violet-600 flex items-center justify-center text-white text-3xl font-bold shadow-md">
                            {{ substr(Auth::user()->nama, 0, 1) }}
                        </div>
                        <div class="absolute bottom-0 right-0 bg-gray-900 rounded-full p-1.5 border-2 border-white cursor-pointer hover:bg-gray-700 transition">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-16 px-8 pb-4 border-b border-gray-100 flex justify-between items-end">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Account Settings</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage your profile details and security preferences.</p>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700 border border-green-200">
                    Active Account
                </span>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" class="p-8">
                @csrf
                @method('PATCH')

                <div class="mb-10">
                    <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                        <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Personal Information
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Full Name</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </span>
                                <input type="text" name="nama" id="nama" value="{{ Auth::user()->nama }}" 
                                    class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-violet-500 focus:border-violet-500 block w-full pl-10 p-3 transition duration-200" 
                                    placeholder="Your Name" required>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email Address</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </span>
                                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" 
                                    class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-violet-500 focus:border-violet-500 block w-full pl-10 p-3 transition duration-200" 
                                    placeholder="name@company.com" required>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100 mb-8">

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                        <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Security & Password
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" name="password" id="password" 
                                class="bg-white border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-violet-500 focus:border-violet-500 block w-full p-3 transition duration-200" 
                                placeholder="Min. 8 characters">
                            <p class="mt-1 text-xs text-gray-400">Leave blank if you don't want to change it.</p>
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                class="bg-white border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-violet-500 focus:border-violet-500 block w-full p-3 transition duration-200" 
                                placeholder="Repeat password">
                        </div>
                    </div>
                </div>

                <div class="flex items-center mb-8 p-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors cursor-pointer">
                    <input id="newsletter" type="checkbox" class="w-4 h-4 text-violet-600 border-gray-300 rounded focus:ring-violet-500 cursor-pointer" required>
                    <label for="newsletter" class="ml-3 text-sm font-medium text-gray-700 cursor-pointer">
                        I confirm that the changes above are correct.
                    </label>
                </div>

                <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-6">
                    <button type="button" onclick="window.history.back()" class="text-gray-500 hover:text-gray-700 font-medium text-sm px-4 py-2 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="text-white bg-gray-900 hover:bg-black focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-xl text-sm px-8 py-3 text-center shadow-lg shadow-gray-500/30 transition-all duration-200 hover:scale-[1.02]">
                        Save Changes
                    </button>
                </div>

            </form>
        </div>

        <div class="fixed bottom-4 w-full text-center text-gray-400 text-xs pointer-events-none">
            &copy; {{ date('Y') }} Profile Management System
        </div>

    </div>

    <x-slot:footer>
        <div class="hidden">Edit Profile Page</div>
    </x-slot:footer>
</x-layout>