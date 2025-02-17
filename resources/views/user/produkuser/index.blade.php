@extends('layouts.user')

@section('content')
    <div class="mt-32 container mx-auto px-4 md:px-8 max-w-screen-l">
        <div class="w-full">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="text-left">
                    <h1 class="text-4xl font-bold text-gray-800">Produk</h1>
                    <p class="text-gray-600 font-bold mt-2">Lihat dan jelajahi paket kami untuk mengabadikan momen terbaik anda.</p>
                </div>

                <!-- Search Box -->
                <div class="relative mt-4 sm:mt-0 flex items-center">
                    <form action="{{ route('produkuser') }}" method="GET" class="w-full">
                        <button class="absolute left-3 top-1/2 transform -translate-y-1/2 text-[#764C31] opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35m1.4-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <input type="text" name="search" placeholder="Cari"
                            class="pl-10 pr-4 py-2 border border-[#764C31]/50 rounded-full focus:outline-none focus:ring-0 focus:border-[#764C31] w-28 focus:w-48 focus:placeholder-transparent focus:shadow-[0_0_8px_4px_#FFEBD0] transition-all duration-300 ease-in-out">
                    </form>
                </div>
            </div>

            <!-- Filter Kategori -->
            <div class="flex justify-between items-center mt-6">
                <!-- Filter Buttons -->
                <div class="flex flex-nowrap relative space-x-4 overflow-x-auto kategori-container" id="kategoriFilters">
                    <!-- Tombol "All Product" -->
                    <form action="{{ route('produkuser') }}" method="GET" style="display: inline;">
                        <input type="hidden" name="kategori_id" value="">
                        <button type="submit"
                            class="filter-button px-6 py-2 rounded-full 
                            {{ request('kategori_id') == '' ? 'bg-[#764C31] text-[#FFF6E4]' : 'bg-[#FFF6E4] text-[#3E3A33] hover:bg-[#E9E0CE]' }}">
                            All Product
                        </button>
                    </form>

                    <!-- Tombol Kategori -->
                    @foreach ($kategoris as $kategori)
                        <form action="{{ route('produkuser') }}" method="GET" style="display: inline;">
                            <input type="hidden" name="kategori_id" value="{{ $kategori->id }}">
                            <button type="submit"
                                class="filter-button px-6 py-2 rounded-full 
                                {{ request('kategori_id') == $kategori->id ? 'bg-[#764C31] text-[#FFF6E4]' : 'bg-[#FFF6E4] text-[#3E3A33] hover:bg-[#E9E0CE]' }}">
                                {{ $kategori->nama_kategori }}
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>

            <!-- Grid Produk -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8 w-full justify-center">
                @if (isset($searchedProduct) && $searchedProduct->isEmpty())
                    <!-- Jika hasil pencarian kosong -->
                    <div class="col-span-full flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <div class="text-2xl">
                            <span class="font-bold">Info alert!</span>
                            Produk atau kategori yang Anda cari tidak ditemukan.
                        </div>
                    </div>
                @elseif (isset($searchedProduct))
                    <!-- Jika ada hasil pencarian -->
                    @foreach ($searchedProduct as $kategori)
                        @foreach ($kategori->produk as $produk)
                            <a href="{{ route('produkuser.show', $produk->id) }}"
                                class="block border border-[#764C31]/50 rounded-[12px] shadow-md overflow-hidden min-w-0 hover:bg-[#FFF6E4] transition duration-300">

                                <!-- Foto Produk -->
                                <div class="relative w-full h-64"> <!-- Tentukan tinggi tetap di sini -->
                                    @if ($produk->portofolio->isNotEmpty() && $produk->portofolio->first()->foto_portofolio)
                                        <img src="https://drive.google.com/thumbnail?id={{ $produk->portofolio->first()->foto_portofolio }}&sz=w1000-h800"
                                            alt="{{ $produk->nama_produk }}" class="object-cover w-full h-full">
                                    @else
                                        <img src="default-image.jpg" alt="Gambar default"
                                            class="object-cover w-full h-full">
                                    @endif
                                </div>

                                <!-- Detail Produk -->
                                <div class="p-4 bg-[#FFFBF4] rounded-[12px] hover:bg-[#FFF6E4]">
                                    <p
                                        class="text-sm text-gray-800 bg-[#DFBE91] px-3 py-1 rounded-full inline-block font-medium">
                                        {{ $kategori->nama_kategori }}
                                    </p>
                                    <h3 class="text-[21px] font-semibold text-gray-800 mt-3">{{ $produk->nama_produk }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mt-2 underline">
                                        Selengkapnya
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @endforeach
                @else
                    <!-- Jika tidak ada pencarian, tampilkan produk berdasarkan filter kategori -->
                    @foreach ($filteredKategori as $kategori)
                        @foreach ($kategori->produk as $produk)
                            <a href="{{ route('produkuser.show', $produk->id) }}"
                                class="block border border-[#764C31]/50 rounded-[12px] shadow-md overflow-hidden min-w-0 hover:bg-[#FFF6E4] transition duration-300">

                                <!-- Foto Produk -->
                                <div class="relative w-full h-64"> <!-- Tentukan tinggi tetap di sini -->
                                    @if ($produk->portofolio->isNotEmpty() && $produk->portofolio->first()->foto_portofolio)
                                        <img src="https://drive.google.com/thumbnail?id={{ $produk->portofolio->first()->foto_portofolio }}&sz=w1000-h800"
                                            alt="{{ $produk->nama_produk }}" class="object-cover w-full h-full">
                                    @else
                                        <img src="default-image.jpg" alt="Gambar default"
                                            class="object-cover w-full h-full">
                                    @endif
                                </div>

                                <!-- Detail Produk -->
                                <div class="p-4 bg-[#FFFBF4] rounded-[12px] hover:bg-[#FFF6E4]">
                                    <p
                                        class="text-sm text-gray-800 bg-[#DFBE91] px-3 py-1 rounded-full inline-block font-medium">
                                        {{ $kategori->nama_kategori }}
                                    </p>
                                    <h3 class="text-[21px] font-semibold text-gray-800 mt-3">{{ $produk->nama_produk }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mt-2 underline">
                                        Selengkapnya
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
    @include('users.components.footer')
    <script>
        const kategoriFilters = document.getElementById('kategoriFilters');
        let isDown = false;
        let startX;
        let scrollLeft;

        // Event Listener untuk mousedown (memulai drag)
        kategoriFilters.addEventListener('mousedown', (e) => {
            isDown = true;
            kategoriFilters.classList.add('active');
            startX = e.pageX - kategoriFilters.offsetLeft;
            scrollLeft = kategoriFilters.scrollLeft;
        });

        // Event Listener untuk mouseleave (keluar dari elemen)
        kategoriFilters.addEventListener('mouseleave', () => {
            isDown = false;
            kategoriFilters.classList.remove('active');
        });

        // Event Listener untuk mouseup (mengakhiri drag)
        kategoriFilters.addEventListener('mouseup', () => {
            isDown = false;
            kategoriFilters.classList.remove('active');
        });

        // Event Listener untuk mousemove (menggulung saat drag)
        kategoriFilters.addEventListener('mousemove', (e) => {
            if (!isDown) return; // Jika tidak sedang drag, hentikan
            e.preventDefault();
            const x = e.pageX - kategoriFilters.offsetLeft;
            const walk = (x - startX) * 2; // Kecepatan scroll (2x lebih cepat)
            kategoriFilters.scrollLeft = scrollLeft - walk;
        });

        // Event Listener untuk scroll horizontal menggunakan roda mouse
        kategoriFilters.addEventListener('wheel', (e) => {
            e.preventDefault(); // Mencegah scroll default (vertikal)
            kategoriFilters.scrollLeft += e.deltaY * 2; // Menggeser secara horizontal
        });
    </script>
@endsection
