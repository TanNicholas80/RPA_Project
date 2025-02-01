@extends('layouts.user')

@section('content')
    <div class="container mx-auto mt-10 px-4 md:px-0">
        <!-- Breadcrumb -->
        <div class="mb-6 text-gray-600">
            <p class="text-sm">
                <span class="text-gray-800 font-semibold">Produk</span> /
                <span
                    class="text-gray-800 font-semibold">{{ $produk->kategori->nama_kategori ?? 'Kategori Tidak Diketahui' }}</span>
                /
                <span class="text-gray-800 font-semibold">{{ $produk->nama_produk }}</span>
            </p>
        </div>
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Foto Produk -->
            <div class="md:w-1/2 relative group swiper-container"> <!-- Tambahkan class group untuk hover di container -->
                <div class="swiper mySwiper2 mb-5">
                    <div class="swiper-wrapper">
                        @foreach ($produk->portofolio as $index => $foto)
                            <div class="swiper-slide">
                                <img src="https://drive.google.com/thumbnail?id={{ $foto->foto_portofolio }}&sz=w1920-h1080"
                                    alt="Foto Produk {{ $produk->nama_produk }}"
                                    class="w-full h-[450px] object-cover rounded-lg shadow-md">
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigasi Panah (Akan tampil saat hover) -->
                    <div
                        class="swiper-button-next bg-[#764C31] text-[#FFF6E4] w-14 h-14 flex items-center justify-center rounded-full shadow-lg absolute top-1/2 right-4 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out transform hover:scale-110 hover:shadow-xl">
                    </div>
                    <div
                        class="swiper-button-prev bg-[#764C31] text-[#FFF6E4] w-14 h-14 flex items-center justify-center rounded-full shadow-lg absolute top-1/2 left-4 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out transform hover:scale-110 hover:shadow-xl">
                    </div>
                </div>

                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($produk->portofolio as $index => $foto)
                            <div class="swiper-slide">
                                <img src="https://drive.google.com/thumbnail?id={{ $foto->foto_portofolio }}&sz=w1920-h1080"
                                    alt="Foto Produk {{ $produk->nama_produk }}"
                                    class="w-full h-[120px] object-cover rounded-lg shadow-md">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Informasi Produk di kanan -->
            <div class="md:w-1/3 md:pl-10">
                <p class="font-bold text-gray-800 bg-[#DFBE91] py-2 px-4 rounded-full inline-block">
                    {{ $produk->kategori->nama_kategori }}</p>
                <h1 class="text-3xl text-gray-800 font-bold mt-4">{{ $produk->nama_produk }}</h1>
                <p class="text-2xl text-gray-700 font-semibold mt-4">Rp
                    {{ number_format($produk->harga_produk ?? 0, 0, ',', '.') }}</p>
                <div class="mt-6">
                    @foreach (['detail' => 'Detail', 'aturan' => 'Aturan Pemesanan', 'tambahan' => 'Tambahan'] as $id => $title)
                        <div class="mb-4 border border-[#000000] rounded-[16px] max-w-[500px]">
                            <button
                                class="w-full text-left px-4 py-3 flex justify-between items-center focus:outline-none transition-all duration-300"
                                onclick="toggleAccordion('{{ $id }}-{{ $produk->id }}')" aria-expanded="false">
                                <h3 class="text-base font-medium">{{ $title }}</h3>
                                <span id="arrow-{{ $id }}-{{ $produk->id }}"
                                    class="arrow-icon w-8 h-8 flex items-center justify-center bg-[#764C31] rounded-full transition-transform duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FFF6E4]" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <hr class="border-t border-gray-300 max-w-[450px] mx-auto ">
                            <div id="{{ $id }}-{{ $produk->id }}"
                                class="accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-white text-gray-700">
                                @if ($id === 'detail')
                                    <ul class="list-disc pl-6 space-y-2 py-4">
                                        <li>Durasi Foto: {{ $produk->durasi_foto }} Menit</li>
                                        <li>Edit Foto: {{ $produk->edit_foto }}</li>
                                        <li>Total Crew: {{ $produk->total_crew }} Orang</li>
                                        <li>Cetak Foto: {{ $produk->cetak_foto }}</li>
                                        <li>Total Orang: {{ $produk->total_orang }} Orang</li>
                                    </ul>
                                @elseif ($id === 'aturan')
                                    <p class="py-4">Aturan pemesanan akan disesuaikan berdasarkan produk ini.</p>
                                @elseif ($id === 'tambahan')
                                    <div class="py-4">
                                        @forelse ($produk->addons ?? [] as $addon)
                                            <div class="mb-2">
                                                <p class="font-semibold text-gray-800">{{ e($addon->nama_addon) }}</p>
                                                <p class="text-sm text-gray-600">{{ e($addon->keterangan_addon) }}</p>
                                                <p class="text-sm text-gray-700">Rp
                                                    {{ number_format($addon->harga_addon ?? 0, 0, ',', '.') }}</p>
                                            </div>
                                        @empty
                                            <p>Tidak ada tambahan untuk produk ini.</p>
                                        @endforelse
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 flex justify-center">
                    <a href="https://wa.me/6285641574777"
                        class="bg-[#764C31] text-[#FFF6E4] w-[243px] h-[56px] flex items-center justify-center rounded-[10px] text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105">
                        Klik di Sini Untuk Memesan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });

            let swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });
        });

        function toggleAccordion(id) {
            const element = document.getElementById(id);
            const arrow = document.getElementById("arrow-" + id);
            if (!element || !arrow) return;

            const isOpen = element.classList.contains("max-h-[300px]");

            element.classList.toggle("max-h-0", isOpen);
            element.classList.toggle("max-h-[300px]", !isOpen);

            arrow.classList.toggle("rotate-180", !isOpen);
        }
    </script>
@endsection
