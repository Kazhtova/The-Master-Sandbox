<x-layout>
    <style>
        input[type="search"]::-webkit-search-cancel-button {
            display: none;
        }
    </style>

    <div class="space-y-6">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Students Data</h1>
                <p class="text-sm text-gray-500 mt-1">Manage and view all registered students.</p>
            </div>

            <form action="{{ route('siswa.index') }}" method="GET" class="w-full md:w-72">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400 group-focus-within:text-purple-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input 
                        type="search" 
                        name="search" 
                        class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all shadow-sm" 
                        placeholder="Search student name..." 
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
                            <th scope="col" class="px-6 py-4 font-semibold">Student Name</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Date of Birth</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Major</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center w-32">Grade</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center w-32">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ( $data as $item )
                            <tr class="bg-white hover:bg-purple-50/50 transition-colors duration-200">
                                
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap align-middle">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold text-xs">
                                            {{ substr($item->nama, 0, 1) }}
                                        </div>
                                        <span>{{ $item->nama }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-middle">
                                    {{ $item->tanggal_lahir }}
                                </td>

                                <td class="px-6 py-4 align-middle text-center">
                                    <div class="flex justify-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $item->jurusan }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-center align-middle">
                                    <div class="flex justify-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            {{ $item->nilai >= 75 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $item->nilai }}
                                        </span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-center align-middle">
                                    <div class="flex justify-center">
                                        <a href="{{ route('siswa.show', $item->id) }}" class="font-medium text-purple-600 hover:text-purple-800 hover:underline transition-colors">
                                            View Details
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <p>No students found matching your criteria.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($data->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $data->appends(request()->query())->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </div>

    <x-slot:footer>
        <div class="mt-8 border-t border-gray-200 pt-6">
            <p class="text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} <span class="font-semibold text-purple-600">Student Management System</span>. All rights reserved.
            </p>
        </div>
    </x-slot:footer>
</x-layout>