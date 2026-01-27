<x-layout>
    <div class="min-h-[80vh] flex items-center justify-center py-10">
        
        <div class="w-full max-w-2xl bg-white shadow-2xl rounded-2xl overflow-hidden border-l-4 border-purple-600 border-y border-r">
            
            <div class="px-8 py-6 bg-gray-50 border-b border-gray-100 flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 tracking-tight flex items-center gap-2">
                        <i class="fas fa-edit text-purple-600"></i> Edit Book Details
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">Modifying existing data record.</p>
                </div>
                <div class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-bold uppercase tracking-wider border border-purple-200">
                    ID: #{{ $buku->id }}
                </div>
            </div>
            
            <form action="{{ route('buku.update', $buku->id) }}" method="POST" class="p-8 space-y-6" id="editBookForm">
                @csrf
                @method('PATCH')

                <div>
                    <label for="judul_buku" class="block text-sm font-semibold text-gray-700 mb-2">Book Title</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-heading"></i>
                        </span>
                        <input type="text" name="judul_buku" id="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" 
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-white border border-gray-200 text-gray-900 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition duration-200 placeholder-gray-400 shadow-sm" 
                            placeholder="Enter book title..." required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label for="penulis" class="block text-sm font-semibold text-gray-700 mb-2">Writer / Author</label>
                        <div class="relative">
                            @php
                                $default = $buku->siswa_id ? "siswa-{$buku->siswa_id}" : ($buku->mentor_id ? "mentor-{$buku->mentor_id}" : '');
                            @endphp
                            
                            <select name="penulis" id="penulis"
                                class="w-full pl-4 pr-10 py-3 rounded-xl bg-white border border-gray-200 text-gray-900 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition duration-200 appearance-none cursor-pointer shadow-sm"
                                required>
                                
                                <optgroup label="Student">
                                    @foreach($siswa as $s)
                                        <option value="siswa-{{ $s->id }}" @selected(old('penulis', $default) == "siswa-{$s->id}")>
                                            {{ $s->nama }}
                                        </option>
                                    @endforeach
                                </optgroup>

                                <optgroup label="Mentor">
                                    @foreach($mentors as $m)
                                        <option value="mentor-{{ $m->id }}" @selected(old('penulis', $default) == "mentor-{$m->id}")>
                                            {{ $m->nama }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                            
                            <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-gray-500">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="tanggal_rilis" class="block text-sm font-semibold text-gray-700 mb-2">Release Date</label>
                        <input type="date" name="tanggal_rilis" id="tanggal_rilis" value="{{ old('tanggal_rilis', $buku->tanggal_rilis) }}"
                            class="w-full px-4 py-3 rounded-xl bg-white border border-gray-200 text-gray-900 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition duration-200 shadow-sm"
                            min="1900" max="2100" required>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6 mt-2 border-t border-gray-100">
                    
                    <a href="{{ route('buku.index') }}" class="text-sm text-gray-500 hover:text-gray-700 font-medium transition-colors">
                        &larr; Back to List
                    </a>

                    <div class="flex items-center gap-3">
                        <button type="button" onclick="window.location.reload()" 
                            class="px-5 py-2.5 rounded-lg text-gray-600 font-medium hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200 text-sm">
                            Reset Changes
                        </button>

                        <button type="submit" 
                            class="px-6 py-2.5 rounded-lg bg-linear-to-r from-purple-600 to-indigo-600 text-white font-semibold shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 flex items-center text-sm">
                            <i class="fas fa-check-circle mr-2"></i> Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot:footer>
        <div class="border-t border-gray-200 mt-10 pt-6">
            <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} Book Management System. All rights reserved.
            </div>
        </div>
    </x-slot:footer>
</x-layout>