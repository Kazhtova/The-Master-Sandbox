<x-layout>
    <div class="min-h-[80vh] flex items-center justify-center py-10">
        
        <div class="w-full max-w-4xl bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
            
            <div class="bg-linear-to-r from-violet-600 to-indigo-700 px-8 py-8 text-white flex justify-between items-start">
                <div>
                    <h2 class="text-3xl font-bold tracking-tight">Student Profile</h2>
                    <p class="text-indigo-100 mt-1 opacity-90">Detailed information and academic records.</p>
                </div>
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-2xl font-bold border border-white/30">
                    {{ substr($siswa->nama, 0, 1) }}
                </div>
            </div>

            <div class="p-8">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Personal Info
                        </h3>

                        <div>
                            <dt class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Full Name</dt>
                            <dd class="text-lg font-medium text-gray-900 mt-1">{{ $siswa->nama }}</dd>
                        </div>

                        <div>
                            <dt class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Date of Birth</dt>
                            <dd class="text-base font-medium text-gray-700 mt-1 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $siswa->tanggal_lahir }}
                            </dd>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex-1">
                                <dt class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Major</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                        {{ $siswa->jurusan }}
                                    </span>
                                </dd>
                            </div>
                            <div class="flex-1">
                                <dt class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Grade</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-violet-50 text-violet-700 border border-violet-100">
                                        {{ $siswa->nilai }}
                                    </span>
                                </dd>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            Academic Records
                        </h3>

                        <div>
                            <dt class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Assigned Mentor</dt>
                            <dd class="mt-2 flex items-center p-3 bg-gray-50 rounded-xl border border-gray-100">
                                <div class="w-8 h-8 rounded-full bg-violet-200 flex items-center justify-center text-violet-700 font-bold text-xs mr-3">
                                    M
                                </div>
                                <span class="font-medium text-gray-700">{{ $siswa->mentor->nama }}</span>
                            </dd>
                        </div>

                        <div>
                            <dt class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Writing Portfolio</dt>
                            <div class="bg-gray-50 rounded-xl border border-gray-100 p-4 max-h-48 overflow-y-auto custom-scrollbar">
                                @php
                                    [$kolom, $nilai] = isset($siswa) ? ['siswa_id', $siswa->id] : ['mentor_id', $mentor->id];
                                @endphp
                                
                                <ul class="space-y-3">
                                    @forelse($buku->where($kolom, $nilai) as $book)
                                        <li class="flex items-start gap-3 bg-white p-3 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                                            <div class="mt-1">
                                                <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-800 leading-tight">{{ $book->judul_buku }}</p>
                                                <p class="text-xs text-gray-500 mt-1">Released: {{ $book->tanggal_rilis }}</p>
                                            </div>
                                        </li>
                                    @empty
                                        <li class="flex flex-col items-center justify-center py-4 text-center">
                                            <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <span class="text-sm text-gray-400 italic">No books published yet.</span>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-gray-100 mt-2">
                    <a href="{{ route('siswa.index') }}" class="text-sm text-gray-500 hover:text-gray-800 font-medium transition-colors flex items-center gap-1">
                        &larr; Back to List
                    </a>

                    <div class="flex gap-3">
                        <a href="{{ route('siswa.edit', $siswa->id) }}" 
                           class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Edit Data
                        </a>

                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="form-delete inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="inline-flex items-center px-5 py-2.5 bg-red-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 transition ease-in-out duration-150 shadow-lg shadow-red-500/30">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="fixed bottom-4 w-full text-center text-gray-400 text-xs pointer-events-none">
            &copy; {{ date('Y') }} Student Management System
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const deleteForms = document.querySelectorAll('.form-delete');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Delete Student?',
                    text: "This action cannot be undone. All related data will be removed.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626', 
                    cancelButtonColor: '#9ca3af',  
                    confirmButtonText: 'Yes, Delete!',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-lg px-4 py-2',
                        cancelButton: 'rounded-lg px-4 py-2'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <x-slot:footer>
        <div class="hidden">Siswa Detail Page</div>
    </x-slot:footer>
</x-layout>