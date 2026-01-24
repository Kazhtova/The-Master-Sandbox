<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem KazFolyo</title>
    
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased text-gray-800">

    @if (session('success'))
      <div id="flash-message" class="fixed top-20 right-5 z-50 animate-bounce-in">
        <div class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 border border-green-200 shadow-lg" role="alert">
          <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
          </svg>
          <div class="ms-3 text-sm font-medium">
             {{ session('success') }}
          </div>
          <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close" onclick="this.parentElement.parentElement.remove()">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
          </button>
        </div>
      </div>
    @endif

    <header class="sticky top-0 z-40 w-full bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm transition-all duration-300">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
            
            <div class="flex items-center gap-2">
                <a class="block text-purple-600 transition hover:scale-105" href="/">
                    <span class="sr-only">Home</span>
                    <svg class="w-9 h-9" xml:space="preserve" viewBox="0 0 896 896" xmlns="http://www.w3.org/2000/svg">
                        <linearGradient id="carrd__a" x1="141.569" x2="754.431" y1="143.569" y2="756.431" gradientTransform="matrix(1 0 0 -1 0 898)" gradientUnits="userSpaceOnUse">
                            <stop offset="0" style="stop-color:#7366a7"/>
                            <stop offset=".268" style="stop-color:#6b68aa"/>
                            <stop offset=".691" style="stop-color:#546db1"/>
                            <stop offset="1" style="stop-color:#3f71b7"/>
                        </linearGradient>
                        <path fill="url(#carrd__a)" d="M448 881.3c-239.4 0-433.4-194-433.4-433.3S208.6 14.7 448 14.7s433.4 194 433.4 433.3-194 433.3-433.4 433.3z"/>
                        <path fill="#FFF" d="M661.2 613.1 401.1 738c-1.6.8-3.4 1.2-5.2 1.2-2.2 0-4.4-.6-6.4-1.8-3.5-2.2-5.6-6-5.6-10.2V603.5l-140.5-58.8c-4.5-1.9-7.4-6.2-7.4-11.1V208.8c0-4.1 2.1-8 5.6-10.2s7.9-2.4 11.6-.7l270.4 129.8 127.3-61.1c3.7-1.8 8.1-1.5 11.6.7s5.6 6 5.6 10.2v324.8c-.1 4.6-2.7 8.8-6.9 10.8zM260 227.9v297.7l123.9 51.9v-59.8L306 486.3c-6.1-2.5-9.1-9.5-6.7-15.6 2.5-6.2 9.5-9.1 15.6-6.7l69 27.8v-49.1L306 411.3c-6.1-2.5-9.1-9.5-6.7-15.6 2.5-6.2 9.5-9.1 15.6-6.7l69 27.8v-14.3c0-4.6 2.6-8.8 6.8-10.8l17.8-8.6-103.1-46.9c-6-2.7-8.7-9.9-6-15.9s9.9-8.7 15.9-6l121.3 55.3 59.1-28.4L260 227.9zm384 68.7L407.9 410V708.2L644 594.7V296.6zM453 451.8l135.3-65.4c6-2.9 13.1-.4 16 5.6s.4 13.2-5.6 16l-135.3 65.4c-1.7.8-3.5 1.2-5.2 1.2-4.5 0-8.7-2.5-10.8-6.8-2.8-5.9-.3-13.1 5.6-16zm0 75 135.3-65.4c6-2.9 13.1-.4 16 5.6s.4 13.2-5.6 16l-135.3 65.4c-1.7.8-3.5 1.2-5.2 1.2-4.5 0-8.7-2.5-10.8-6.8-2.8-6-.3-13.1 5.6-16zm0 74.9 135.3-65.4c6-2.9 13.1-.4 16 5.6s.4 13.2-5.6 16l-135.3 65.4c-1.7.8-3.5 1.2-5.2 1.2-4.5 0-8.7-2.5-10.8-6.8-2.8-5.9-.3-13.1 5.6-16z"/>
                    </svg>
                </a>
                <span class="hidden md:block font-bold text-xl tracking-tight text-gray-900">KazFolyo</span>
            </div>

            <nav class="hidden md:flex flex-1 items-center justify-center">
                <ul class="flex items-center gap-8 text-sm font-medium">
                    <li>
                        <a href="/" class="{{ request()->is('/') ? 'text-purple-600' : 'text-gray-500 hover:text-purple-600' }} transition">
                            Home
                        </a>
                    </li>
                    
                    <li class="relative group">
                        <button class="{{ request()->routeIs('siswa.*') ? 'text-purple-600' : 'text-gray-500 hover:text-purple-600' }} flex items-center gap-1 transition">
                            Siswa
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-40 bg-white border border-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
                            <a href="{{ route('siswa.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Daftar Siswa</a>
                            <a href="{{ route('siswa.create') }}" class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Tambah Siswa</a>
                        </div>
                    </li>

                    <li class="relative group">
                        <button class="{{ request()->routeIs('buku.*') ? 'text-purple-600' : 'text-gray-500 hover:text-purple-600' }} flex items-center gap-1 transition">
                            Buku
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-40 bg-white border border-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
                            <a href="{{ route('buku.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Daftar Buku</a>
                            <a href="{{ route('buku.create') }}" class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Tambah Buku</a>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}" class="{{ request()->is('contact') ? 'text-purple-600' : 'text-gray-500 hover:text-purple-600' }} transition">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center gap-4">
                @guest
    <div class="hidden sm:flex sm:items-center sm:gap-2">
        <a class="rounded-full px-5 py-2 text-sm font-medium text-gray-600 transition hover:bg-purple-50 hover:text-purple-600" 
           href="{{ route('auth.login') }}">
            Login
        </a>

        <a class="rounded-full bg-purple-600 px-5 py-2 text-sm font-medium text-white shadow-md transition hover:bg-purple-700 hover:shadow-lg" 
           href="{{ route('auth.register') }}">
            Register
        </a>
    </div>
@endguest

                @auth
                    <div class="relative group">
                        <button class="flex items-center gap-2 rounded-full border border-gray-200 bg-white pl-3 pr-2 py-1.5 transition hover:border-purple-200 hover:shadow-md">
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->nama }}</span>
                            <div class="bg-purple-100 text-purple-600 rounded-full p-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                        </button>
                        
                        <div class="absolute right-0 top-full mt-2 w-48 bg-white border border-gray-100 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0 z-50">
                            <div class="px-4 py-3 border-b border-gray-50">
                                <p class="text-xs text-gray-500">Signed in as</p>
                                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email ?? 'User' }}</p>
                            </div>
                            <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-600">Profile</a>
                            <form action="{{ route('logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth

                <div class="block md:hidden">
                    <button id="mobile-menu-btn" class="rounded-lg bg-gray-50 p-2 text-gray-600 transition hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-4 py-4 shadow-inner">
             <ul class="space-y-3">
                 <li><a href="/" class="block text-gray-600 hover:text-purple-600 font-medium">Home</a></li>
                 <li><a href="{{ route('siswa.index') }}" class="block text-gray-600 hover:text-purple-600 font-medium">Data Siswa</a></li>
                 <li><a href="{{ route('buku.index') }}" class="block text-gray-600 hover:text-purple-600 font-medium">Data Buku</a></li>
                 <li><a href="{{ route('contact') }}" class="block text-gray-600 hover:text-purple-600 font-medium">Contact</a></li>
                 @guest
                    <div class="mt-4 flex flex-col gap-2">
                         <a href="{{ route('auth.login') }}" class="w-full text-center rounded-lg border border-gray-300 py-2 text-sm font-medium text-gray-700">Login</a>
                         <a href="{{ route('auth.register') }}" class="w-full text-center rounded-lg bg-purple-600 py-2 text-sm font-medium text-white">Register</a>
                    </div>
                 @endguest
             </ul>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-10 min-h-[60vh]">
        {{ $slot }}
    </main>

    <footer class="border-t border-gray-100 bg-white py-10 mt-10">
        <div class="mx-auto max-w-7xl px-4 text-center text-gray-500">
            <!-- <p>&copy; {{ date('Y') }} {{ $footer ?? 'Sekolahku' }}. All rights reserved.</p> -->
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');

        if(btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>