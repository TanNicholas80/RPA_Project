@extends('layouts.user')

@section('content')
    <div class="container mx-auto mt-10 px-4 md:px-0">
        <!-- Breadcrumb -->
        <div class="mb-6 text-gray-600">
            <p class="text-sm">
                <span class="text-gray-800 font-semibold">Produk</span> /
                <span class="text-gray-800 font-semibold">{{ $produk->kategori->nama_kategori ?? 'Kategori Tidak Diketahui' }}</span> /
                <span class="text-gray-800 font-semibold">{{ $produk->nama_produk }}</span>
            </p>
        </div>

       

            <!-- Foto Produk -->
            <div class="md:w-1/2 relative group"> <!-- Tambahkan class group untuk hover di container -->
                <div class="swiper gallery-top">
                    <div class="swiper-wrapper">
                        @foreach ($produk->portofolio as $index => $foto)
                            <div class="swiper-slide">
                                <img src="https://drive.google.com/thumbnail?id={{ $foto->foto_portofolio }}&sz=w1920-h1080"
                                     alt="Foto Produk {{ $produk->nama_produk }}"
                                     class="w-full max-h-[450px] object-cover rounded-lg shadow-md">
                            </div>
                        @endforeach
                    </div>
                </div>

         
<!-- Navigasi Panah (Akan tampil saat hover) -->
<div class="swiper-button-next bg-[#764C31] text-[#FFF6E4] w-10 h-10 flex items-center justify-center rounded-full shadow-lg absolute top-1/2 right-4 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out transform hover:scale-110 hover:shadow-xl">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
    </svg>
</div>
<div class="swiper-button-prev bg-[#764C31] text-[#FFF6E4] w-10 h-10 flex items-center justify-center rounded-full shadow-lg absolute top-1/2 left-4 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out transform hover:scale-110 hover:shadow-xl">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white rotate-180 transition-transform duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
    </svg>
</div>



            </div>
        </div>
         <!-- Informasi Produk di kanan -->
        <div class="md:w-2/3 md:pl-10">
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
                                onclick="toggleAccordion('{{ $id }}-{{ $produk->id }}')"
                                aria-expanded="false">
                                <h3 class="text-base font-medium">{{ $title }}</h3>
                            </button>
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
                                    <p class="py-4">Tambahan produk bisa dipilih di sini.</p>
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
 <!-- Kontainer Produk -->
        <div class="md:flex items-start">
            <!-- Thumbnail Foto -->
            <div class="md:w-1/2 mt-2 swiper gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach ($produk->portofolio as $index => $foto)
                        <div class="swiper-slide w-auto !m-2 !p-0 relative cursor-pointer">
                            <img src="https://drive.google.com/thumbnail?id={{ $foto->foto_portofolio }}&sz=w1000-h800"
                                 alt="Foto {{ $index + 1 }}"
                                 data-index="{{ $index }}"
                                 class="w-16 h-16 object-cover rounded-md shadow-md thumbnail"
                                 id="thumbnail-{{ $index }}"
                            >
                            <div class="absolute inset-0 bg-white opacity-40 pointer-events-none thumbnail-overlay"
                                 id="overlay-{{ $index }}"></div>
                        </div>
                    @endforeach
                </div>
            </div>
       
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiperTop = new Swiper('.gallery-top', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                loop: false, // Ubah ke false untuk menghindari masalah index
                on: {
                    slideChange: function () {
                        updateActiveThumbnail(swiperTop.activeIndex);
                    }
                }
            });

            var swiperThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 5,
                slidesPerView: 'auto',
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                slideToClickedSlide: true,
                loop: false,
            });

            swiperTop.controller.control = swiperThumbs;
            swiperThumbs.controller.control = swiperTop;

            document.querySelectorAll('.thumbnail').forEach((thumbnail, index) => {
                thumbnail.addEventListener('click', function () {
                    console.log("Thumbnail diklik:", index);
                    swiperTop.slideTo(index);
                });
            });

            function updateActiveThumbnail(activeIndex) {
                document.querySelectorAll('.thumbnail').forEach((thumb, index) => {
                    const overlay = document.getElementById("overlay-" + index);
                    const thumbnailElement = document.getElementById("thumbnail-" + index);
                    if (index === activeIndex) {
                        thumbnailElement.classList.remove('opacity-40'); // Remove opacity on active thumbnail
                        overlay.classList.add('hidden'); // Hide white overlay on active thumbnail
                    } else {
                        thumbnailElement.classList.add('opacity-40'); // Add opacity to inactive thumbnails
                        overlay.classList.remove('hidden'); // Show white overlay on inactive thumbnails
                    }
                });
            }

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
