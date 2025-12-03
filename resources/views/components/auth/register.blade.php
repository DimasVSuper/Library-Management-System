<!--
    Komponen Register Blade
    ----------------------
    Halaman ini adalah komponen register untuk user baru.
    - Mendukung dark mode.
    - Menggunakan Tailwind CSS.
    - Form POST ke route register.post, CSRF, dan atribut name sesuai controller.
    - Validasi required pada semua input.
    - Link login diarahkan ke route login.
    - Menampilkan error validasi dari backend.
    - Siap integrasi backend Laravel.
-->

<div class="h-full bg-gray-400 dark:bg-gray-900">
    <div class="mx-auto">
        <div class="flex justify-center px-6 py-12">
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <div class="w-full h-auto bg-gray-400 dark:bg-gray-800 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"></div>
                <div class="w-full lg:w-7/12 bg-white dark:bg-gray-700 p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="py-4 text-2xl text-center text-gray-800 dark:text-white">Buat Akun Baru!</h3>
                    
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

                    <form method="POST" action="{{ route('register.post') }}" class="px-8 pt-6 pb-8 mb-4 bg-white dark:bg-gray-800 rounded">
                        @csrf
                        
                        <!-- Nama Lengkap -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white" for="name">
                                Nama Lengkap
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('name') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                                id="name"
                                name="name"
                                type="text"
                                placeholder="Nama Lengkap"
                                value="{{ old('name') }}"
                                required
                            />
                            @error('name')
                                <p class="text-xs italic text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('email') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                                id="email"
                                name="email"
                                type="email"
                                placeholder="Email"
                                value="{{ old('email') }}"
                                required
                            />
                            @error('email')
                                <p class="text-xs italic text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password & Confirm Password -->
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0 flex-1">
                                <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white" for="password">
                                    Kata Sandi
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('password') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="******************"
                                    required
                                />
                                <p class="text-xs italic text-gray-500">Minimal 8 karakter.</p>
                                @error('password')
                                    <p class="text-xs italic text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:ml-2 flex-1">
                                <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-white" for="password_confirmation">
                                    Konfirmasi Kata Sandi
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 dark:text-white border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('password_confirmation') border-red-500 bg-red-50 @else border-gray-300 @enderror"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    placeholder="******************"
                                    required
                                />
                                @error('password_confirmation')
                                    <p class="text-xs italic text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline transition duration-200"
                                type="submit"
                            >
                                Daftar Akun
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        
                        <!-- Login Link -->
                        <div class="text-center">
                            <a class="inline-block text-sm text-blue-500 dark:text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('login') }}">
                                Sudah punya akun? Login!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>