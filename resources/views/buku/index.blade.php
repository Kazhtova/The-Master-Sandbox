<x-layout>
    <x-slot:title>Data Buku</x-slot:title>

    @push('styles')
        <style>
            input[type="search"]::-webkit-search-cancel-button {
                display: none;
            }
        </style>
    @endpush

    <div class="max-w-7xl mx-auto space-y-6 min-h-[80vh] py-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Library Collection</h1>
                <p class="text-gray-500 mt-2 text-sm">Manage and organize your entire book repository.</p>
            </div>

            <form action="{{ route('buku.index') }}" method="GET" class="w-full md:w-96">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400 group-focus-within:text-violet-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input 
                        type="search" 
                        name="search" 
                        class="block w-full py-3 pl-10 pr-4 text-sm text-gray-900 border border-gray-200 rounded-xl bg-white focus:ring-2 focus:ring-violet-500 focus:border-violet-500 transition-all shadow-sm placeholder-gray-400" 
                        placeholder="Search by title, author, or mentor..." 
                        value="{{ request('search') }}"
                        autocomplete="off"
                    >
                </div>
            </form>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-bold text-center w-16">#</th>
                            <th scope="col" class="px-6 py-4 font-bold text-left">Book Title</th>
                            <th scope="col" class="px-6 py-4 font-bold text-center w-1/4">Author / Writer</th>
                            <th scope="col" class="px-6 py-4 font-bold text-center w-40">Release Date</th>
                            <th scope="col" class="px-6 py-4 font-bold text-center w-32">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $no = 1; ?>
                        @forelse ($data as $item )
                            <tr class="bg-white hover:bg-violet-50/40 transition-colors duration-200">
                                
                                <td class="px-6 py-4 text-center font-medium text-gray-400 align-middle">
                                    {{ $no++ }}
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-900 align-middle">
                                    <span class="text-base line-clamp-1" title="{{ $item->judul_buku }}">
                                        {{ $item->judul_buku }}
                                    </span>
                                </td> 

                                <td class="px-6 py-4 align-middle text-center">
                                    <div class="flex justify-center">
                                        @if($item->mentor)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-violet-100 text-violet-700 border border-violet-200 whitespace-nowrap">
                                                Mentor: {{ $item->mentor->nama }}
                                            </span>
                                        @elseif($item->siswa)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700 border border-blue-200 whitespace-nowrap">
                                                Student: {{ $item->siswa->nama }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200 whitespace-nowrap">
                                                {{ $item->penulis }}
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 text-center align-middle">
                                    <span class="text-gray-500 font-mono text-xs bg-gray-50 px-2 py-1 rounded border border-gray-200 whitespace-nowrap">
                                        {{ $item->tanggal_rilis }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-center align-middle">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('buku.edit', $item->id) }}" 
                                           class="p-2 text-gray-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all duration-200" 
                                           title="Edit Data">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>

                                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="form-delete inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" 
                                                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200" 
                                                    title="Hapus Data">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-900">No books found</h3>
                                        <p class="text-sm mt-1 max-w-xs mx-auto">We couldn't find any books matching your search.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex items-center justify-between">
                <span class="text-xs text-gray-500">Showing data records</span>
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
                    title: 'Delete Book?',
                    text: "Action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626', 
                    cancelButtonColor: '#9ca3af',
                    confirmButtonText: 'Yes, Delete',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    customClass: { popup: 'rounded-2xl', confirmButton: 'rounded-lg px-4 py-2', cancelButton: 'rounded-lg px-4 py-2' }
                }).then((result) => {
                    if (result.isConfirmed) form.submit();
                });
            });
        });
    </script>

    <x-slot:footer>
        <div class="border-t border-gray-200 mt-8 pt-6 pb-8">
            <p class="text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} <span class="font-semibold text-violet-600">Library Management System</span>. All rights reserved.
            </p>
        </div>
    </x-slot:footer>
</x-layout>