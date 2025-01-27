@extends('layouts.user')

@section('content')
    <div class="mt-6 px-4">
        <!-- Header -->
        <div class="text-left">
            <h1 class="text-4xl font-bold text-gray-800">Portofolio</h1>
            <p class="text-gray-600 mt-2">Lihat hasil momen-momen indah yang telah kami abadikan untuk klien.</p>
        </div>

        <!-- Filter and Search -->
        <div class="flex justify-between items-center mt-6">
            <!-- Filter Buttons -->
            <div class="flex flex-nowrap relative space-x-4 overflow-x-auto kategori-container" id="kategoriFilters">
                <button data-kategori-id=""
                    class="filter-button px-6 py-2 bg-[#764C31] text-[#FFF6E4] rounded-full focus:outline-none">
                    All Product
                </button>
                @foreach ($kategoris as $kategori)
                    <button data-kategori-id="{{ $kategori->id }}"
                        class="filter-button px-6 py-2 bg-[#FFF6E4] text-[#3E3A33] rounded-full hover:bg-[#E9E0CE] border border-[#764C31] border-opacity-40 hover:border-opacity-50">
                        {{ $kategori->nama_kategori }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Tab -->
        <div class="flex justify-center w-full mt-4">
            <div class="flex border-gray-300">
                <button id="tabFoto"
                    class="tab-button px-4 py-2 w-40 text-black font-semibold border-b-2 border-black focus:outline-none transition-all">
                    Foto
                </button>
                <button id="tabVideo"
                    class="tab-button px-4 py-2 w-40 text-gray-500 font-semibold border-b-2 border-gray-300 focus:outline-none hover:text-black hover:border-black transition-all">
                    Video
                </button>
            </div>
        </div>

        <!-- Portfolio Items -->
        <div id="containerFoto" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <!-- Data Foto -->
            @foreach ($kategoris as $kategori)
                @foreach ($kategori->produk as $produk)
                    @foreach ($produk->portofolio->where('status_portofolio', 'foto') as $portofolio)
                        <div class="rounded shadow-lg">
                            <img src="https://drive.google.com/thumbnail?id={{ $portofolio->foto_portofolio }}&sz=w1000-h800"
                                alt="{{ $produk->nama_produk }}" class="object-cover h-56 w-full">
                        </div>
                    @endforeach
                @endforeach
            @endforeach
        </div>

        <div id="containerVideo" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6 hidden">
            <!-- Data Video -->
            @foreach ($kategoris as $kategori)
                @foreach ($kategori->produk as $produk)
                    @foreach ($produk->portofolio->where('status_portofolio', 'video') as $portofolio)
                        <div class="rounded shadow-lg">
                            <iframe class="w-full h-56 rounded"
                                src="https://drive.google.com/file/d/{{ $portofolio->foto_portofolio }}/preview"
                                allow="autoplay" allowfullscreen>
                            </iframe>
                        </div>
                    @endforeach
                @endforeach
            @endforeach
        </div>
    </div>

    <script>
        const tabFoto = document.getElementById('tabFoto');
        const tabVideo = document.getElementById('tabVideo');
        const containerFoto = document.getElementById('containerFoto');
        const containerVideo = document.getElementById('containerVideo');
        const kategoriFilters = document.getElementById('kategoriFilters');
        let isDown = false;
        let startX;
        let scrollLeft;

        // Event listener untuk tab Foto
        tabFoto.addEventListener('click', () => {
            containerFoto.classList.remove('hidden');
            containerVideo.classList.add('hidden');

            tabFoto.classList.add('text-black', 'border-black');
            tabVideo.classList.remove('text-black', 'border-black');
        });

        // Event listener untuk tab Video
        tabVideo.addEventListener('click', () => {
            containerFoto.classList.add('hidden');
            containerVideo.classList.remove('hidden');

            tabVideo.classList.add('text-black', 'border-black');
            tabFoto.classList.remove('text-black', 'border-black');
        });

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
