<x-layout>
    <x-slot:title>Data Buku</x-slot:title>

    @push('styles')
        <style>
            input[type="search"]::-webkit-search-cancel-button {
                display: none;
            }
        </style>
    @endpush

    <div class="space-y-6">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Library Collection</h1>
                <p class="text-sm text-gray-500 mt-1">Manage books, mentors, and authors.</p>
            </div>

            <form action="{{ route('buku.index') }}" method="GET" class="w-full md:w-80">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400 group-focus-within:text-violet-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input 
                        type="search" 
                        name="search" 
                        class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all shadow-sm" 
                        placeholder="Search book title..." 
                        value="{{ request('search') }}"
                        autocomplete="off"
                    >
                </div>
            </form>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold text-center w-16">#</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Book Title</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Author / Writer</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Release Date</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php $no = 1; ?>
                        @forelse ($data as $item )
                            <tr class="bg-white hover:bg-violet-50/50 transition-colors duration-200 group">
                                
                                <td class="px-6 py-4 text-center font-medium text-gray-400">
                                    {{ $no++ }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <span class="text-base">{{ $item->judul_buku }}</span>
                                </td> 

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($item->mentor)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-violet-100 text-violet-800 border border-violet-200">
                                            <span>Mentor: {{ $item->mentor->nama }}</span>
                                        </span>
                                    @elseif($item->siswa)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                            <span>Student: {{ $item->siswa->nama }}</span>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                            <span>{{ $item->penulis }}</span>
                                        </span>
                                    @endif
                                </td>
                                
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <span class="text-gray-600 font-mono text-xs bg-gray-50 px-2 py-1 rounded border border-gray-200">
                                        {{ $item->tanggal_rilis }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        
                                        <a href="{{ route('buku.edit', $item->id) }}" 
                                           class="p-2 text-gray-500 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition-all duration-200" 
                                           title="Edit Data">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>

                                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="form-delete inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" 
                                                    class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200" 
                                                    title="Hapus Data">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        <h3 class="text-lg font-medium text-gray-900">No books found</h3>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                {{ $data->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const deleteForms = document.querySelectorAll('.form-delete');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#7c3aed', 
                    cancelButtonColor: '#9ca3af',
                    confirmButtonText: 'Yes, delete it!',
                    reverseButtons: true,
                    customClass: { popup: 'rounded-xl', confirmButton: 'rounded-lg px-4 py-2', cancelButton: 'rounded-lg px-4 py-2' }
                }).then((result) => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    </script>

    <x-slot:footer>
        <div class="mt-8 border-t border-gray-200 pt-6">
            <p class="text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} <span class="font-semibold text-violet-600">Library Management System</span>. All rights reserved.
            </p>
        </div>
    </x-slot:footer>
</x-layout>