<x-layout>
    <div class="min-h-[80vh] flex items-center justify-center py-10">

        <div class="w-full max-w-3xl bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
            
            <div class="bg-linear-to-r from-violet-600 to-indigo-700 px-8 py-6 text-white flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight">Register New Student</h2>
                    <p class="text-indigo-100 text-sm mt-1 opacity-90">Fill in the form below to add a new student record.</p>
                </div>
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
            </div>

            <form action="{{ route('siswa.store') }}" method="POST" class="p-8 space-y-6">
                @csrf

                <div>
                    <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                            class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/20 transition duration-200 placeholder-gray-400" 
                            placeholder="e.g. Alexander Hamilton" required>
                    </div>
                    @error('nama')
                        <p class="mt-1 text-sm text-red-500 font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth</label>
                        <div class="relative">
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" 
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/20 transition duration-200"
                                required>
                        </div>
                        @error('tanggal_lahir')
                            <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jurusan" class="block text-sm font-semibold text-gray-700 mb-2">Major</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </span>
                            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" 
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/20 transition duration-200 placeholder-gray-400" 
                                placeholder="e.g. Computer Science" required>
                        </div>
                        @error('jurusan')
                            <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nilai" class="block text-sm font-semibold text-gray-700 mb-2">Grade Score</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            </span>
                            <input type="number" name="nilai" id="nilai" value="{{ old('nilai') }}" 
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/20 transition duration-200 placeholder-gray-400" 
                                placeholder="0 - 100" min="0" max="100" required>
                        </div>
                        @error('nilai')
                            <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="mentor_id" class="block text-sm font-semibold text-gray-700 mb-2">Assign Mentor</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </span>
                            <select id="mentor_id" name="mentor_id" 
                                class="w-full pl-11 pr-10 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-violet-500 focus:ring-4 focus:ring-violet-500/20 transition duration-200 appearance-none cursor-pointer" required>
                                <option disabled selected hidden value="">-- Select Mentor --</option>
                                @foreach ( $mentors as $mentor )
                                    <option value="{{ $mentor->id }}" {{ old('mentor_id') == $mentor->id ? 'selected' : '' }}>
                                        {{ $mentor->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                        @error('mentor_id')
                            <p class="mt-1 text-sm text-red-500 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-6 mt-4 border-t border-gray-100 flex items-center justify-between gap-4">
                    <a href="{{ route('siswa.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" 
                        class="px-8 py-3 rounded-xl bg-linear-to-r from-violet-600 to-indigo-600 text-white font-semibold shadow-lg shadow-violet-500/30 hover:shadow-violet-500/50 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Save Student Data
                    </button>
                </div>

            </form>
        </div>

        <div class="fixed bottom-4 w-full text-center text-gray-400 text-xs pointer-events-none">
            &copy; {{ date('Y') }} Student Management System
        </div>
    </div>

    <x-slot:footer>
        <div class="hidden">Create Siswa Page</div>
    </x-slot:footer>
</x-layout>