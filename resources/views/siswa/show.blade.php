<x-layout>
    <div class="flow-root">
  <dl class="-my-3 divide-y divide-gray-200 text-sm">
    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
      <dt class="font-black text-gray-900">Nama</dt>

      <dd class="text-gray-700 sm:col-span-2 text-base font-medium">{{ $siswa->nama }}</dd>
    </div>

    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
      <dt class="font-black text-gray-900">Tanggal Lahir</dt>

      <dd class="text-gray-700 sm:col-span-2 text-base font-medium">{{ $siswa->tanggal_lahir }}</dd>
    </div>

    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
      <dt class="font-black text-gray-900">Jurusan</dt>

      <dd class="text-gray-700 sm:col-span-2 text-base font-medium">{{ $siswa->jurusan }}</dd>
    </div>

    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
      <dt class="font-black text-gray-900">Nilai</dt>

      <dd class="text-gray-700 sm:col-span-2 text-base font-medium">
        {{ $siswa->nilai }}
      </dd>
    </div>
    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
      <dt class="font-black text-gray-900">Mentor Siswa</dt>
      <dd class="text-gray-700 sm:col-span-2 text-base font-medium">
        {{ $siswa->mentor->nama }}
      </dd>
    </div>
    <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
      <dt class="font-black text-gray-900">List Penulisan</dt>
      <dd class="text-gray-700 sm:col-span-2 text-base font-medium ">
    <!-- @foreach($buku as $item)
        @if($item->siswa_id == $siswa->id)
            <div class="mb-1 border-b pb-1 last:border-0">
                - {{ $item->judul_buku }} 
                <span class="text-sm text-gray-500">({{ $item->tanggal_rilis }})</span>
            </div>
        @endif
    @endforeach -->
    @php
    [$kolom, $nilai] = isset($siswa) ? ['siswa_id', $siswa->id] : ['mentor_id', $mentor->id];
    @endphp
    @forelse($buku->where($kolom, $nilai) as $book)
        
        <div class="mb-1 border-b pb-1 last:border-0 text-base">
            - {{ $book->judul_buku }} 
            <span class="text-sm text-gray-500">({{ $item->tanggal_rilis }})</span>
        </div>

    @empty
        
        <span class="text-gray-400 italic">Siswa ini belum memiliki buku.</span>

    @endforelse
      </dd>
    </div>
  </dl>
</div>
      <div class="flex gap-4 my-8">
    
    <a href="{{ route('siswa.edit', $siswa->id) }}" 
       class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition inline-flex items-center">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
         <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
       </svg>
       Edit
    </a>

    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="form-delete inline-block">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
            Delete
        </button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const deleteForms = document.querySelectorAll('.form-delete');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus Data Siswa?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                background: '#1f2937', 
                color: '#ffffff'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
    <x-slot:footer>
        <strong>Siswa Detail Page</strong>
    </x-slot:footer>
  </x-layout>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-gray-500 text-sm">
          &copy; {{ date('Y') }} Detail Manajemen Siswa
  </div>