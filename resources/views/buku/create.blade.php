<x-layout>
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden border border-gray-100">
        <div class="bg-purple-600 px-6 py-4">
            <h3 class="text-white text-lg font-bold flex items-center">
                <i class="fas fa-plus-circle mr-2"></i> Tambah Buku Baru
            </h3>
        </div>
        
        <form action="{{ route('buku.store') }}" method="POST" class="p-6">
            @csrf


            <div class="mb-5">
                <label for="judul_buku" class="block text-sm font-medium text-gray-700 mb-2">Judul Buku</label>
                <input type="text" name="judul_buku" id="judul_buku" value="{{ old('judul_buku') }}" 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2 border" 
                    placeholder="Masukkan judul buku..." required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="md:col-span-2">
                    <label for="penulis" class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                    <select name="penulis" id="penulis"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2 border"
                        required>
                        <option value="" selected disabled><b>Pilih Penulis</b></option>
                        <optgroup label="Nama Siswa">
                        @foreach($siswa as $s)
                            <option value="siswa-{{  $s->id  }}">
                                {{ $s->nama }}
                            </option>
                        @endforeach
                        </optgroup>
                        
                        <optgroup label="Nama Mentor">
                        @foreach($mentors as $m)
                            <option value="mentor-{{ $m->id }}">
                                {{ $m->nama }}
                            </option>
                        @endforeach
                        </optgroup>
                    </select>
                </div>
                
                <div>
                    <label for="tanggal_rilis" class="block text-sm font-medium text-gray-700 mb-2">Tahun Terbit</label>
                    <input type="date" name="tanggal_rilis" id="tanggal_rilis" value="{{ old('tanggal_rilis') }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2 border"
                        min="1900" max="2100" required>
                </div>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium" onclick="reload()">
                    Reset
                </button>
                <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-lg font-medium">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
    <x-slot:footer>
        <strong>Create Siswa Footer</strong>
    </x-slot:footer>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Sistem Manajemen Buku
    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>
    function reload(){
        document.getElementById('judul_buku', 'penulis', 'tanggal_rilis').value = '';
    }
</script>