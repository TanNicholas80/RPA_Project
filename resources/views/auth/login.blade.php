<x-nav-login />

<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h3 class="text-3xl font-bold text-center mb-5" style="color: #764C31; font-family: 'Inter';">MASUK SEBAGAI ADMIN
        </h3>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <div class="relative flex items-center">
                <span class="absolute left-1">
                    <img src="{{ asset('assets/img/User.png') }}" alt="Icon">
                </span>
                <x-text-input id="email" class="block mt-1 w-full pl-10" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan Email" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative flex items-center">
                <span class="absolute left-1">
                    <img src="{{ asset('assets/img/Secure.png') }}" alt="Icon">
                </span>
                <x-text-input id="password" class="block mt-1 w-full px-10" type="password" name="password" required
                    autocomplete="current-password" />
                <span class="absolute right-2">
                    <img src="{{ asset('assets/img/invisible_password.png') }}" alt="Visible" class="toggle-icon">
                </span>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('span img[alt="Visible"]');

            toggleIcon.classList.add('toggle-icon'); // Tambahkan kelas CSS

            toggleIcon.addEventListener('click', function() {
                toggleIcon.style.opacity = '0'; // Menghilangkan opacity sebelum pergantian

                setTimeout(() => {
                    // Ganti gambar setelah animasi opacity selesai
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleIcon.src =
                        '{{ asset('assets/img/visible_password.png') }}'; // Gambar mata terbuka
                    } else {
                        passwordInput.type = 'password';
                        toggleIcon.src =
                        '{{ asset('assets/img/invisible_password.png') }}'; // Gambar mata tertutup
                    }

                    // Kembalikan opacity setelah gambar diganti
                    toggleIcon.style.opacity = '1';
                }, 300); // Sesuai dengan durasi transisi CSS (0.3s)
            });
        });
    </script>
</x-guest-layout>
