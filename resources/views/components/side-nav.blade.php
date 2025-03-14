<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#FFF6E4] border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-[#FFF6E4] dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white nav_hover dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3 text-lg font-semibold" style="color: #764C31;">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white nav_hover dark:hover:bg-gray-700 group">
                    <i
                        class="fa-solid fa-user text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3 text-lg font-semibold" style="color: #764C31">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white nav_hover dark:hover:bg-gray-700 group">
                    <i
                        class="fa-solid fa-folder-open text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3 text-lg font-semibold" style="color: #764C31">Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white nav_hover dark:hover:bg-gray-700 group">
                    <i
                        class="fa-solid fa-basket-shopping text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3 text-lg font-semibold" style="color: #764C31">Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('portofolio.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white nav_hover dark:hover:bg-gray-700 group">
                    <i
                        class="fa-solid fa-image text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3 text-lg font-semibold" style="color: #764C31">Portofolio</span>
                </a>
            </li>
            <li>
                <a href="{{ route('addon.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white nav_hover dark:hover:bg-gray-700 group">
                    <i
                        class="fa-solid fa-circle-plus text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3 text-lg font-semibold" style="color: #764C31">Tambahan</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}" class="flex items-center nav_hover rounded-lg">
                    @csrf
                    <button type="submit"
                        class="flex items-center p-2 text-gray-900 dark:text-white dark:hover:bg-gray-700 group">
                        <i
                            class="fa-solid fa-right-from-bracket text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ms-3 text-lg font-semibold" style="color: #764C31">Log Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
