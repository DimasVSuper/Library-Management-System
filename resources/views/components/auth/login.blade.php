<!--
    Komponen Login Blade
    --------------------
    Halaman ini adalah komponen login untuk pengguna.
    - Menggunakan Tailwind CSS untuk styling.
    - Form sudah sesuai standar Laravel (POST ke route login.post, CSRF, dan atribut name pada input).
    - Terdapat validasi required pada setiap input.
    - Terdapat fitur "Remember Me" dan "Forgot Password".
    - Link pendaftaran diarahkan ke halaman register.
    - Menampilkan error validasi dari backend.
    - Siap untuk integrasi backend Laravel.
-->

<div class="h-full bg-gray-400 dark:bg-gray-900">
    <div class="mx-auto">
        <div class="flex justify-center px-6 py-12">
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <div class="w-full h-auto bg-gradient-to-br from-blue-500 to-purple-500 dark:bg-gray-800 hidden lg:flex lg:w-5/12 bg-cover rounded-l-lg items-center justify-center">
                    <div class="text-center text-white p-8">
                        <h2 class="text-4xl font-bold mb-4">Selamat Datang Kembali!</h2>
                        <p class="text-lg mb-6">Masuk ke akun Anda untuk melanjutkan</p>
                        <svg class="w-24 h-24 mx-auto opacity-50" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                </div>
                <div class="w-full lg:w-7/12 bg-white dark:bg-gray-700 p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="py-4 text-2xl text-center text-gray-800 dark:text-white font-bold">Masuk</h3>
                    
                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}" class="px-8 pt-6 pb-8 mb-4 bg-white dark:bg-gray-800 rounded">
                        @csrf
                        
                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('email') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                                id="email"
                                name="email"
                                type="email"
                                placeholder="Email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                            />
                            @error('email')
                                <p class="text-xs italic text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white" for="password">
                                Kata Sandi
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('password') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                                id="password"
                                name="password"
                                type="password"
                                placeholder="Kata Sandi"
                                required
                            />
                            @error('password')
                                <p class="text-xs italic text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 flex items-center">
                            <input
                                class="w-4 h-4"
                                id="remember"
                                name="remember"
                                type="checkbox"
                                value="on"
                            />
                            <label class="ml-2 text-sm text-gray-600 dark:text-gray-400" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline transition duration-200"
                                type="submit"
                            >
                                Masuk
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        
                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Belum punya akun?</p>
                            <a class="inline-block text-sm text-blue-500 dark:text-blue-500 align-baseline hover:text-blue-800 font-semibold"
                                href="{{ route('register') }}">
                                Daftar sekarang
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
              