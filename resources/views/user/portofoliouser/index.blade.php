@extends('layouts.user')

@section('content')
    <div class="mt-32 container mx-auto  px-4 md:px-8">
        <div class="w-full">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="text-left">
                    <h1 class="text-4xl font-bold text-gray-800">Portofolio</h1>
                    <p class="text-gray-600 font-bold mt-2">Lihat hasil momen-momen indah yang telah kami abadikan untuk
                        klien.</p>
                </div>

                <!-- Search Box -->
                <div class="relative mt-4 sm:mt-0 flex items-center">
                    <form action="{{ route('portofoliouser') }}" method="GET" class="w-full">
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

            <!-- Filter and Search -->
            <div class="flex justify-between items-center mt-6">
                <!-- Filter Buttons -->
                <div class="flex flex-nowrap relative space-x-4 overflow-x-auto kategori-container" id="kategoriFilters">
                    <!-- Tombol "All Product" -->
                    <form action="{{ route('portofoliouser') }}" method="GET" style="display: inline;">
                        <input type="hidden" name="kategori_id" value="">
                        <button type="submit"
                            class="filter-button px-6 py-2 rounded-full 
                            {{ request('kategori_id') == '' ? 'bg-[#764C31] text-[#FFF6E4]' : 'bg-[#FFF6E4] text-[#3E3A33] hover:bg-[#E9E0CE]' }}">
                            All Portofolio
                        </button>
                    </form>

                    <!-- Tombol Kategori -->
                    @foreach ($kategoris as $kategori)
                        <form action="{{ route('portofoliouser') }}" method="GET" style="display: inline;">
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
            <div id="containerFoto" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">

                @php
                    $hasPortofolio = false;
                @endphp
                <!-- Data Foto -->
                @if (isset($searchedPorto))
                    @foreach ($searchedPorto as $kategori)
                        @foreach ($kategori->produk as $produk)
                            @foreach ($produk->portofolio->where('status_portofolio', 'foto') as $portofolio)
                                @php
                                    $hasPortofolio = true;
                                @endphp
                                <div class="rounded-2xl shadow-lg transform transition-all hover:bg-[#FFFBF4] hover:border-[#764C31] hover:border-2 hover:scale-105 cursor-pointer"
                                    onclick="openModal('{{ $portofolio->foto_portofolio }}' , '{{ $portofolio->nama_portofolio }}')">
                                    <img src="https://drive.google.com/thumbnail?id={{ $portofolio->foto_portofolio }}&sz=w1000-h800"
                                        alt="{{ $produk->nama_produk }}" class="object-cover h-56 w-full rounded-t-2xl">
                                    <div class="p-4 flex flex-col">
                                        <div
                                            class="text-sm bg-[#DFBE91] text-black font-semibold px-3 py-1 mb-3 rounded-full">
                                            {{ $kategori->nama_kategori }}
                                        </div>
                                        <p class="text-xl font-semibold text-black">
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endforeach
                @else
                    @foreach ($filteredKategori as $kategori)
                        @foreach ($kategori->produk as $produk)
                            @foreach ($produk->portofolio->where('status_portofolio', 'foto') as $portofolio)
                                @php
                                    $hasPortofolio = true;
                                @endphp
                                <div class="rounded-2xl shadow-lg transform transition-all hover:bg-[#FFFBF4] hover:border-[#764C31]/50 hover:border-2 hover:scale-105 cursor-pointer"
                                    onclick="openModal('{{ $portofolio->foto_portofolio }}' , '{{ $portofolio->nama_portofolio }}')">
                                    <img src="https://drive.google.com/thumbnail?id={{ $portofolio->foto_portofolio }}&sz=w1000-h800"
                                        alt="{{ $produk->nama_produk }}" class="object-cover h-56 w-full rounded-t-2xl">
                                    <div class="p-4 flex flex-col">
                                        <div
                                            class="text-sm bg-[#DFBE91] text-black font-semibold px-3 py-1 mb-3 rounded-full w-fit inline-block">
                                            {{ $kategori->nama_kategori }}
                                        </div>

                                        <p class="text-xl">{{ $portofolio->nama_portofolio }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endforeach
                @endif

                @if (!$hasPortofolio)
                    <div class="col-span-full flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <div class="text-2xl">
                            <span class="font-bold">Info alert!</span>
                            Kategori ini tidak memiliki foto portofolio.
                        </div>
                    </div>
                @endif
            </div>

            <div id="containerVideo" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6 hidden">
                @php
                    $hasPortofolio = false;
                @endphp
                <!-- Data Video -->
                @if (isset($searchedPorto))
                    @foreach ($searchedPorto as $kategori)
                        @foreach ($kategori->produk as $produk)
                            @foreach ($produk->portofolio->where('status_portofolio', 'video') as $portofolio)
                                @php
                                    $hasPortofolio = true;
                                @endphp
                                <div class="relative rounded-2xl shadow-lg transform transition-all hover:bg-[#FFFBF4] hover:border-[#764C31]/50 hover:border-2 hover:scale-105 cursor-pointer overflow-hidden"
                                    onclick="openModalVideo('{{ $portofolio->foto_portofolio }}', '{{ $portofolio->nama_portofolio }}')">
                                    <iframe class="h-56 w-full rounded-t-2xl"
                                        src="https://drive.google.com/file/d/{{ $portofolio->foto_portofolio }}/preview"
                                        allow="autoplay" allowfullscreen>
                                    </iframe>
                                    <div class="p-4 flex flex-col">
                                        <div
                                            class="text-sm bg-[#DFBE91] text-black font-semibold px-3 py-1 mb-3 rounded-full w-fit inline-block">
                                            {{ $kategori->nama_kategori }}
                                        </div>
                                        <p class="text-xl">{{ $portofolio->nama_portofolio }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endforeach
                @else
                    @foreach ($filteredKategori as $kategori)
                        @foreach ($kategori->produk as $produk)
                            @foreach ($produk->portofolio->where('status_portofolio', 'video') as $portofolio)
                                @php
                                    $hasPortofolio = true;
                                @endphp
                                <div class="relative rounded-2xl shadow-lg transform transition-all hover:bg-[#FFFBF4] hover:border-[#764C31]/50 hover:border-2 hover:scale-105 cursor-pointer overflow-hidden"
                                    onclick="openModalVideo('{{ $portofolio->foto_portofolio }}', '{{ $portofolio->nama_portofolio }}')">
                                    <iframe class="w-full h-56 rounded-t-2xl"
                                        src="https://drive.google.com/file/d/{{ $portofolio->foto_portofolio }}/preview"
                                        allow="autoplay" allowfullscreen>
                                    </iframe>
                                    <div class="p-4 flex flex-col">
                                        <div
                                            class="text-sm bg-[#DFBE91] text-black font-semibold px-3 py-1 mb-3 rounded-full w-fit inline-block">
                                            {{ $kategori->nama_kategori }}
                                        </div>
                                        <p class="text-xl">{{ $portofolio->nama_portofolio }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endforeach
                @endif

                @if (!$hasPortofolio)
                    <div class="col-span-full flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                        role="alert">
                        <div class="text-2xl">
                            <span class="font-bold">Info alert!</span>
                            Kategori ini tidak memiliki video portofolio.
                        </div>
                    </div>
                @endif
            </div>


            <!-- Modal for Enlarged Image -->

            <div id="imageModal"
                class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center hidden transition-opacity duration-300 ease-in-out">
                <div class="relative w-[90vw] max-w-3xl group">
                    <div
                        class="absolute -top-12 left-1/2 transform -translate-x-1/2 text-white text-lg px-4 py-2 rounded-md flex items-center gap-4">
                        <p id="modalTitle" class="font-semibold text-2xl text-center mr-9"></p>
                        <button onclick="closeModal()" class="text-white text-4xl font-bold">&times;</button>
                    </div>
                    <!-- Image -->
                    <img id="modalImage" class="w-full md:h-[500px] object-cover rounded-lg shadow-xl">

                    <!-- Navigation Buttons -->
                    <button id="prevImage"
                        class="absolute left-2 top-1/2 transform -translate-y-1/2 text-black text-4xl bg-[#FFF6E4] px-5 py-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">&#10094;</button>
                    <button id="nextImage"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-black text-4xl bg-[#FFF6E4] px-5 py-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">&#10095;</button>

                    <!-- Category -->
                    <p id="modalCategory"
                        class="absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-black bg-opacity-50 text-white text-lg px-4 py-2 rounded-md">
                    </p>
                </div>
            </div>


            <!-- Modal untuk Video -->
            <div id="videoModal"
                class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center hidden transition-opacity duration-300 ease-in-out">
                <div class="relative w-[90vw] max-w-3xl group">
                    <div
                        class="absolute -top-12 left-1/2 transform -translate-x-1/2 text-white text-lg px-4 py-2 rounded-md flex items-center gap-4">
                        <p id="modalTitleVideo" class="font-semibold text-2xl text-center mr-9"></p>
                        <button onclick="closeModalVideo()" class="text-white text-4xl font-bold">&times;</button>
                    </div>

                    <!-- Video Player -->
                    <iframe class="w-[80vw] h-[35vh] md:h-[70vh] rounded-lg shadow-xl" id="videoSource"
                        allow="autoplay"></iframe>

                    <!-- Navigation Buttons -->
                    <button id="prevVideo"
                        class="absolute left-2 top-1/2 transform -translate-y-1/2 text-black text-4xl bg-[#FFF6E4] px-5 py-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">&#10094;</button>
                    <button id="nextVideo"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-black text-4xl bg-[#FFF6E4] px-5 py-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">&#10095;</button>

                    <!-- Category -->
                    <p id="modalCategoryVideo"
                        class="absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-black bg-opacity-50 text-white text-lg px-4 py-2 rounded-md">
                    </p>
                </div>
            </div>
        </div>
    </div>
    @include('users.components.footer')
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
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - kategoriFilters.offsetLeft;
            const walk = (x - startX) * 2;
            kategoriFilters.scrollLeft = scrollLeft - walk;
        });

        // Event Listener untuk scroll horizontal menggunakan roda mouse
        kategoriFilters.addEventListener('wheel', (e) => {
            e.preventDefault();
            kategoriFilters.scrollLeft += e.deltaY * 2;
        });

        // Function to render portfolio
        function renderPortofolio(fotos) {
            containerFoto.innerHTML = '';

            if (fotos.length > 0) {
                fotos.forEach(foto => {
                    const div = document.createElement('div');
                    div.classList.add('rounded-xl', 'shadow-lg', 'overflow-hidden', 'bg-white', 'hover:shadow-2xl',
                        'transition-all', 'cursor-pointer');
                    div.setAttribute('onclick', `openModal('${foto.foto_portofolio}')`);

                    const img = document.createElement('img');
                    img.src = `https://drive.google.com/thumbnail?id=${foto.foto_portofolio}&sz=w1000-h800`;
                    img.alt = foto.nama_produk;
                    img.classList.add('object-cover', 'h-56', 'w-full');

                    const span = document.createElement('span');
                    span.classList.add('text-sm', 'bg-[#764C31]', 'text-[#FFF6E4]', 'px-3', 'py-1', 'rounded-full');
                    span.innerText = foto.kategori;

                    const p = document.createElement('div');
                    p.classList.add('p-4', 'flex', 'items-center', 'justify-between');
                    p.appendChild(span);

                    div.appendChild(img);
                    div.appendChild(p);

                    containerFoto.appendChild(div);
                });
            } else {
                containerFoto.innerHTML =
                    '<p class="text-center text-gray-500 w-full">No portfolio items found for this category.</p>';
            }
        }

        let images = [];
        let videos = [];
        let titles = [];
        let categories = [];
        let currentIndex = 0;

        function openModal(imageUrl, title, category) {
            images = Array.from(document.querySelectorAll('[onclick^="openModal"]'));
            titles = images.map(img => img.getAttribute('onclick').match(/'([^']+)'/g)?.[1]?.replace(/'/g, '') || '');
            categories = images.map(img => img.getAttribute('onclick').match(/'([^']+)'/g)?.[2]?.replace(/'/g, '') || '');

            currentIndex = images.findIndex(img => img.getAttribute('onclick').includes(imageUrl));
            updateModalImage();
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function openModalVideo(videoUrl, title, category) {
            videos = Array.from(document.querySelectorAll('[onclick^="openModalVideo"]'));
            titles = videos.map(vid => vid.getAttribute('onclick').match(/'([^']+)'/g)?.[1]?.replace(/'/g, '') || '');
            categories = videos.map(vid => vid.getAttribute('onclick').match(/'([^']+)'/g)?.[2]?.replace(/'/g, '') || '');

            currentIndex = videos.findIndex(vid => vid.getAttribute('onclick').includes(videoUrl));
            updateModalVideo();
            document.getElementById('videoModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        function closeModalVideo() {
            document.getElementById('videoModal').classList.add('hidden');
        }

        function updateModalImage() {
            if (currentIndex < 0 || currentIndex >= images.length) return;

            const imageUrl = images[currentIndex].getAttribute('onclick').match(/'([^']+)'/)?.[1] || '';
            document.getElementById('modalImage').src = `https://drive.google.com/thumbnail?id=${imageUrl}&sz=w1000-h800`;
            document.getElementById('modalTitle').textContent = titles[currentIndex] || '';
            document.getElementById('modalCategory').textContent = categories[currentIndex] || '';
        }

        function updateModalVideo() {
            if (currentIndex < 0 || currentIndex >= videos.length) return;

            const videoUrl = videos[currentIndex].getAttribute('onclick').match(/'([^']+)'/)?.[1] || '';
            document.getElementById('videoSource').src = `https://drive.google.com/file/d/${videoUrl}/preview`;
            document.getElementById('modalTitleVideo').textContent = titles[currentIndex] || '';
            document.getElementById('modalCategoryVideo').textContent = categories[currentIndex] || '';
        }

        document.getElementById('prevImage').addEventListener('click', () => {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
            updateModalImage();
        });

        document.getElementById('prevVideo').addEventListener('click', () => {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : videos.length - 1;
            updateModalVideo();
        });

        document.getElementById('nextImage').addEventListener('click', () => {
            currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
            updateModalImage();
        });

        document.getElementById('nextVideo').addEventListener('click', () => {
            currentIndex = (currentIndex < videos.length - 1) ? currentIndex + 1 : 0;
            updateModalVideo();
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowLeft') {
                document.getElementById('prevImage').click();
                document.getElementById('prevVideo').click();
            } else if (event.key === 'ArrowRight') {
                document.getElementById('nextImage').click();
                document.getElementById('nextVideo').click();
            } else if (event.key === 'Escape') {
                closeModal();
                closeModalVideo();
            }
        });
    </script>
@endsection
