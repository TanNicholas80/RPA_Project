<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse ml-12">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-14">
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-white bg-[#764C31] hover:bg-[#DFBE91] hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white bg-[#764C31] hover:bg-[#DFBE91] hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Login
                    </a>
                @endauth
            @endif
            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-black md:dark:text-blue-500"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="#tentangKami"
                        class="block py-2 px-3 md:p-0 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Tentang Kami</a>
                </li>
                <li>
                    <a href="{{ route('produkuser') }}"
                        class="block py-2 px-3 md:p-0 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Produk</a>
                </li>
                <li>
                    <a href="{{ route('portofoliouser') }}"
                        class="block py-2 px-3 md:p-0 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Portofolio</a>
                </li>
                <li>
                    <a href="#kontak"
                        class="block py-2 px-3 md:p-0 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
