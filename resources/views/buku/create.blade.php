<x-layout>
    <div class="min-h-[80vh] flex items-center justify-center py-10">
        
        <div class="w-full max-w-2xl bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
            
            <div class="px-8 pt-8 pb-4">
                <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Add New Book</h2>
                <p class="text-sm text-gray-500 mt-1">Please fill in the details below to add a record.</p>
            </div>

            <form action="{{ route('buku.store') }}" method="POST" class="px-8 pb-8 pt-4 space-y-6" id="bookForm">
                @csrf

                <div>
                    <label for="judul_buku" class="block text-sm font-semibold text-gray-700 mb-2">Book Title</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <i class="fas fa-heading"></i>
                        </span>
                        <input type="text" name="judul_buku" id="judul_buku" value="{{ old('judul_buku') }}" 
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition duration-200 placeholder-gray-400" 
                            placeholder="e.g. Harry Potter and the Philosopher's Stone" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label for="penulis" class="block text-sm font-semibold text-gray-700 mb-2">Writer / Author</label>
                        <div class="relative">
                            <select name="penulis" id="penulis"
                                class="w-full pl-4 pr-10 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition duration-200 appearance-none cursor-pointer"
                                required>
                                <option value="" selected disabled>Select Writer...</option>
                                
                                <optgroup label="Student">
                                    @foreach($siswa as $s)
                                        <option value="siswa-{{ $s->id }}">{{ $s->nama }}</option>
                                    @endforeach
                                </optgroup>
                                
                                <optgroup label="Mentor">
                                    @foreach($mentors as $m)
                                        <option value="mentor-{{ $m->id }}">{{ $m->nama }}</option>
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
                        <input type="date" name="tanggal_rilis" id="tanggal_rilis" value="{{ old('tanggal_rilis') }}"
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:bg-white focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition duration-200"
                            min="1900" max="2100" required>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6 mt-4 border-t border-gray-100">
                    
                    <a href="{{ route('buku.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors flex items-center gap-1">
                        &larr; Back
                    </a>

                    <div class="flex items-center gap-3">
                        <button type="button" onclick="resetForm()" 
                            class="px-5 py-2.5 rounded-lg text-gray-600 font-medium hover:bg-gray-100 hover:text-gray-800 transition-colors duration-200 text-sm">
                            Reset
                        </button>
                        
                        <button type="submit" 
                            class="px-6 py-2.5 rounded-lg bg-linear-to-r from-purple-600 to-indigo-600 text-white font-semibold shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200 flex items-center text-sm">
                            <i class="fas fa-save mr-2"></i> Save Book
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

<script>
    function resetForm(){
        document.getElementById('bookForm').reset();
    }
</script>