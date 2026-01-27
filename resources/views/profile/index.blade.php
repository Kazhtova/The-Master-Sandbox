<x-layout>
  <div class="block rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6 min-h-60">
    <div class="flex items-start gap-4">
      
      <form 
        action="{{ route('profile.update') }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="shrink-0 group block relative"
      >
        @csrf
        @method('PATCH') 

        <input type="hidden" name="nama" value="{{ Auth::user()->nama }}">
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">

        <label for="avatar_upload" class="cursor-pointer block relative">
            
            <div class="absolute inset-0 flex items-center justify-center rounded-full bg-black bg-opacity-50 opacity-0 transition group-hover:opacity-100 z-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                </svg>
            </div>

            @if(Auth::user()->avatar_url)
                <img 
                    class="size-14 rounded-full object-cover transition group-hover:ring-2 group-hover:ring-indigo-500" 
                    src="{{ Auth::user()->avatar_url }}" 
                    alt="Avatar user" 
                />
            @else
                <div class="size-14 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-xl uppercase transition group-hover:ring-2 group-hover:ring-indigo-500">
                    {{ substr(Auth::user()->nama, 0, 1) }}
                </div>
            @endif
        </label>

        <input 
            type="file" 
            name="avatar" 
            id="avatar_upload" 
            class="hidden" 
            accept="image/*"
            onchange="this.form.submit()" 
        >
      </form>

      <div>
        <h3 class="font-semibold text-2xl text-gray-900">
          {{ Auth::user()->nama }}
        </h3>
        <span class="mt-2 inline-block rounded bg-indigo-100 px-2.5 py-0.5 text-sm font-medium text-indigo-800">
          Student
        </span>
      </div>
    </div>

  <dl class="mt-6 flex gap-4 sm:gap-6 border-t border-gray-100 pt-4">
    <div class="flex items-center gap-2">
      <dt class="text-gray-500">
        <span class="sr-only"></span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
        </svg>
      </dt>
      <dd class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</dd>
    </div>

    <div class="flex items-center gap-2">
      <dt class="text-gray-500">
        <span class="sr-only">Lokasi</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
      </dt>
      <dd class="text-sm font-medium text-gray-500">{{ Auth::user()->updated_at }}</dd>
    </div>
  </dl>
  
  <div class="mt-4 flex justify-end">
      <a href="{{ route('profile.edit', Auth::user()->id) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
          Edit Profile &rarr;
      </a>
  </div>
</div>
    <x-slot:footer>
        <strong>Profile Page</strong>
    </x-slot:footer>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Manajemen Profile
        </div>
</x-layout>