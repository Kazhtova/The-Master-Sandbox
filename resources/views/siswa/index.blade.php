<x-layout>
    <form action="{{ route('siswa.index') }}" method="GET" class="max-w-md mx-auto mb-10 w-full group">
        <style>
            input[type="search"]::-webkit-search-cancel-button {
                -webkit-appearance: none;
                appearance: none;
                display: none;
            }
        </style>

        <div class="relative">
            <input 
                type="search" 
                name="search" 
                id="search" 
                class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-purple-500 focus:outline-none focus:ring-0 focus:border-purple-600 peer transition-colors" 
                placeholder=" " 
                value="{{ request('search') }}" 
            />
            
            <label for="search" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-left peer-focus:left-0 peer-focus:text-purple-600 peer-focus:dark:text-purple-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Ketik nama siswa disini...
            </label>
            
            <button type="submit" class="absolute right-0 bottom-2 text-gray-500 peer-focus:text-purple-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
        </div>
    </form>

        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 border-b-4 border-purple-800 inline-block pb-2">
                Daftar Siswa
            </h1>
        </div>

    </div>
</form>
    <div class="overflow-x-auto">
  <table class="min-w-full divide-y-2 divide-gray-200">
    <thead class="ltr:text-left rtl:text-right">
      <tr class="*:font-medium *:text-gray-900">
        <th class="px-3 py-2 whitespace-nowrap">Nama</th>
        <th class="px-3 py-2 whitespace-nowrap">Tanggal Lahir</th>
        <th class="px-3 py-2 whitespace-nowrap">Jurusan</th>
        <th class="px-3 py-2 whitespace-nowrap">Nilai</th>
        <th class="px-3 py-2 whitespace-nowrap">Details</th>
      </tr>
    </thead>

    <tbody class="divide-y divide-gray-200">
        @foreach ( $data as $item )
      <tr class="*:text-gray-900 *:first:font-medium">
        <td class="px-3 py-2 whitespace-nowrap">{{ $item->nama }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $item->tanggal_lahir }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $item->jurusan }}</td>
        <td class="px-3 py-2 whitespace-nowrap">{{ $item->nilai }}</td>
        <td class="px-3 py-2 whitespace-nowrap">
          <a href='{{ route('siswa.show', $item->id) }}' class="text-purple-500 font-bold hover:opacity-50">View Details</a>
        </td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

  <div class="py-10 px-40">
    {{ $data->appends(request()->query())->links('vendor.pagination.tailwind') }}
  </div>
    
    <x-slot:footer>
        <strong>Siswa Page</strong>
    </x-slot:footer>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Sistem Manajemen Siswa
        </div>
</x-layout>
