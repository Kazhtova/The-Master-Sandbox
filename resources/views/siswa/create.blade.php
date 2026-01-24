<x-layout>
    <h1 class="text-xl mb-5 font-bold">Create Data Siswa</h1>
    <form action="{{ route('siswa.store') }}" method="POST" class="space-y-4 max-w-4xl">
        @csrf
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
            <input type="text" name="nama" id="nama" class="block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-purple-500 focus:ring-purple-500 sm:text-sm"placeholder="" value="{{ old('nama') }}">
            
            @error('nama')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-purple-500 focus:ring-purple-500 sm:text-sm text-gray-500"placeholder="dd/mm/yyyy" value="{{ old('tanggal_lahir') }}">
            
            @error('tanggal_lahir')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-purple-500 focus:ring-purple-500 sm:text-sm" value="{{ old('jurusan') }}">
            
            @error('jurusan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nilai</label>
            <input type="number" name="nilai" id="nilai" class="block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:border-purple-500 focus:ring-purple-500 sm:text-sm" value="{{ old('nilai') }}">
            
            @error('nilai')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Mentor</label>
            <select 
            id="mentor_id" 
            name="mentor_id"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm" value="{{ old('mentor_id') }}">
                <option disabled selected hidden value="">-- Pilih Mentor --</option>
                @foreach ( $mentors as $mentor )
                <option value="{{ $mentor->id }}">{{ $mentor->nama }}</option>
                @endforeach
            </select>

            @error('mentor_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Simpan Data</button>
        </div>

        <!-- @if ($errors->any())
            <div class="my-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500 text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
    </form>
    <x-slot:footer>
        <strong>Create Siswa Footer</strong>
    </x-slot:footer>
</x-layout>