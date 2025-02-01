<nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse ml-4 md:ml-12">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-12 md:h-14">
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-white bg-[#764C31] hover:bg-[#DFBE91] hover:text-black font-medium rounded-lg text-sm px-4 py-2 transition-all duration-300">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-white bg-[#764C31] hover:bg-[#DFBE91] hover:text-black font-medium rounded-lg text-sm px-4 py-2 transition-all duration-300">
                        Login
                    </a>
                @endauth
            @endif
            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col md:flex-row md:space-x-8 font-medium p-4 md:p-0 border border-gray-100 rounded-lg bg-gray-50 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent">
                <li><a href="/" class="block py-2 px-3 md:p-0 text-black hover:text-[#764C31] transition-colors duration-300">Beranda</a></li>
                <li><a href="/tentangKami" class="block py-2 px-3 md:p-0 text-gray-500 hover:text-[#764C31] transition-colors duration-300">Tentang Kami</a></li>
                <li><a href="/produkuser" class="block py-2 px-3 md:p-0 text-gray-500 hover:text-[#764C31] transition-colors duration-300">Produk</a></li>
                <li><a href="/portofoliouser" class="block py-2 px-3 md:p-0 text-gray-500 hover:text-[#764C31] transition-colors duration-300">Portofolio</a></li>
                <li><a href="/kontak" class="block py-2 px-3 md:p-0 text-gray-500 hover:text-[#764C31] transition-colors duration-300">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
