<x-auth-layout>
    <x-slot:title>
        Login Page
    </x-slot:title>
    <section class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700">
  <div class="container h-full p-10">
    <div
      class="flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
      <div class="w-full">
        <div
          class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
          <div class="g-0 lg:flex lg:flex-wrap">
            <div class="px-4 md:px-0 lg:w-6/12">
              <div class="md:mx-6 md:p-12">
                <div class="text-center">
                  <svg class="mx-auto w-48" xml:space="preserve" viewBox="0 0 896 896" xmlns="http://www.w3.org/2000/svg">
                    <linearGradient id="carrd__a" x1="141.569" x2="754.431" y1="143.569" y2="756.431" gradientTransform="matrix(1 0 0 -1 0 898)" gradientUnits="userSpaceOnUse">
                        <stop offset="0" style="stop-color:#7366a7"/>
                        <stop offset=".268" style="stop-color:#6b68aa"/>
                        <stop offset=".691" style="stop-color:#546db1"/>
                        <stop offset="1" style="stop-color:#3f71b7"/>
                    </linearGradient>
                    <path fill="url(#carrd__a)" d="M448 881.3c-239.4 0-433.4-194-433.4-433.3S208.6 14.7 448 14.7s433.4 194 433.4 433.3-194 433.3-433.4 433.3z"/>
                    <path fill="#FFF" d="M661.2 613.1 401.1 738c-1.6.8-3.4 1.2-5.2 1.2-2.2 0-4.4-.6-6.4-1.8-3.5-2.2-5.6-6-5.6-10.2V603.5l-140.5-58.8c-4.5-1.9-7.4-6.2-7.4-11.1V208.8c0-4.1 2.1-8 5.6-10.2s7.9-2.4 11.6-.7l270.4 129.8 127.3-61.1c3.7-1.8 8.1-1.5 11.6.7s5.6 6 5.6 10.2v324.8c-.1 4.6-2.7 8.8-6.9 10.8zM260 227.9v297.7l123.9 51.9v-59.8L306 486.3c-6.1-2.5-9.1-9.5-6.7-15.6 2.5-6.2 9.5-9.1 15.6-6.7l69 27.8v-49.1L306 411.3c-6.1-2.5-9.1-9.5-6.7-15.6 2.5-6.2 9.5-9.1 15.6-6.7l69 27.8v-14.3c0-4.6 2.6-8.8 6.8-10.8l17.8-8.6-103.1-46.9c-6-2.7-8.7-9.9-6-15.9s9.9-8.7 15.9-6l121.3 55.3 59.1-28.4L260 227.9zm384 68.7L407.9 410V708.2L644 594.7V296.6zM453 451.8l135.3-65.4c6-2.9 13.1-.4 16 5.6s.4 13.2-5.6 16l-135.3 65.4c-1.7.8-3.5 1.2-5.2 1.2-4.5 0-8.7-2.5-10.8-6.8-2.8-5.9-.3-13.1 5.6-16zm0 75 135.3-65.4c6-2.9 13.1-.4 16 5.6s.4 13.2-5.6 16l-135.3 65.4c-1.7.8-3.5 1.2-5.2 1.2-4.5 0-8.7-2.5-10.8-6.8-2.8-6-.3-13.1 5.6-16zm0 74.9 135.3-65.4c6-2.9 13.1-.4 16 5.6s.4 13.2-5.6 16l-135.3 65.4c-1.7.8-3.5 1.2-5.2 1.2-4.5 0-8.7-2.5-10.8-6.8-2.8-5.9-.3-13.1 5.6-16z"/>
                  </svg>
                  <h4 class="mb-12 mt-1 pb-1 text-xl font-semibold">
                    Ini Adalah Project Laravel Kashka
                  </h4>
                </div>

                <form action="{{ route('register') }}" method="POST">
                  @csrf
                  <p class="mb-4">Please register an account</p>
                  <div class="relative mb-4" data-twe-input-wrapper-init>
                    <label for="nama">Nama</label>
                    <input type="nama" class="px-2 py-1 w-full border border-purple-150 rounded-md " type="nama" name="nama" id="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="relative mb-4" data-twe-input-wrapper-init>
                    <label for="email">Email</label>
                    <input type="email" class="px-2 py-1 w-full border border-purple-150 rounded-md " type="email" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="relative mb-4" data-twe-input-wrapper-init>
                    <label for="password">Password</label>
                    <input type="password" class="px-2 py-1 w-full border border-purple-150 rounded-md" name="password" id="password">
                    @error('password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="relative mb-4" data-twe-input-wrapper-init>
                    <label for="password">Password Confirmation</label>
                    <input type="password" class="px-2 py-1 w-full border border-purple-150 rounded-md" name="password_confirmation" id="password_confirmation">
                  </div>

                  <div class="mb-12 pb-1 pt-1 text-center">
                    <button
                      type="submit"
                      class="cursor-pointer mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out hover:shadow-dark-2 focus:shadow-dark-2 focus:outline-none focus:ring-0 active:shadow-dark-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                      data-twe-ripple-init
                      data-twe-ripple-color="light"
                      style="
                        background: linear-gradient(to right, #000000, #2c003e, #512da8, #7b1fa2);
                      ">
                      Sign up
                    </button>

                    <a href="#!">Remember Me?</a>
                  </div>

                  <div class="flex items-center justify-between pb-6">
                    <p class="mb-0 me-2">Have an account?</p>
                    <a
                      href="{{ route('auth.login') }}"
                      class="inline-block rounded border-2 border-danger px-6 pb-1.5 pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-danger-50/50 hover:text-danger-600 focus:border-danger-600 focus:bg-danger-50/50 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-purple-950 dark:focus:bg-purple-950 cursor-pointer"
                      data-twe-ripple-init
                      data-twe-ripple-color="light">
                      Login
                    </a>
                  </div>
                </form>
              </div>
            </div>

            <!-- Right column container with background and description-->
            <div
              class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-e-lg lg:rounded-bl-none"
              style="background: linear-gradient(to right, #000000, #2c003e, #512da8, #7b1fa2)">
              <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                <h4 class="mb-6 text-xl font-semibold">
                    Saya Lebih Dari Yang Diperkiraan.
                </h4>
                <p class="text-sm">
                    Saya adalah seorang profesional yang berdedikasi dengan pengalaman dalam mengembangkan solusi inovatif dan efektif. Dengan kombinasi keahlian teknis dan pemikiran kreatif, saya berkomitmen untuk memberikan hasil berkualitas tinggi yang memenuhi kebutuhan klien. Passion saya terletak pada penciptaan karya yang tidak hanya fungsional, tetapi juga memberikan dampak positif bagi pengguna.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</x-auth-layout>