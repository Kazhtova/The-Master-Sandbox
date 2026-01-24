<x-layout>
    <x-slot:title>Data Buku</x-slot:title>
    
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @endpush

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 border-b-4 border-violet-500 inline-block pb-2">
                Daftar Buku
            </h1>
        </div>

            <form action="{{ route('buku.index') }}" method="GET" class="max-w-md mx-auto mb-6 w-full">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Cari judul buku..." autofocus value="{{ request('search') }}" />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Search</button>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-purple-600 text-white"><tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Judul Buku</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Penulis</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Tanggal Rilis</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            <?php $no = 1; ?>
            @foreach ($data as $item )
        
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-gray-500"><?= $no++; ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->judul_buku }}</td> 
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
    @if($item->mentor)
        <span class="text-purple-600 font-bold">Mentor:</span> {{ $item->mentor->nama }}
    @elseif($item->siswa)
        <span class="text-blue-600 font-bold">Siswa:</span> {{ $item->siswa->nama }}
    @else
        {{ $item->penulis }}
    @endif</td>
                
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 border border-gray-200">
                        {{ $item->tanggal_rilis }}
                    </span>
                </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="{{ route('buku.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-600 mr-3 transition transform hover:scale-140 inline-block" title="Edit">
                                    <i class="fas fa-edit fa-lg">Edit</i>
                                </a>
                                <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="inline-block form-delete">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-600 transition transform hover:scale-140" title="Hapus">
                                        <i class="fas fa-trash-alt fa-lg cursor-pointer"> Hapus</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-10 px-40">
            {{ $data->appends(request()->query())->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const deleteForms = document.querySelectorAll('.form-delete');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus Data Ini?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',  
                cancelButtonColor: '#3085d6', 
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                background: '#1f2937',  
                color: '#ffffff',       
                iconColor: '#f87171',   
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
    <x-slot:footer>
        <strong>
            Daftar Buku
        </strong>
    </x-slot:footer>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Sistem Manajemen Buku
        </div>
</x-layout>