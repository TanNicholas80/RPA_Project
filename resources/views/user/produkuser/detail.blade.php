@extends('layouts.user')

@section('content')
    <div class="container mx-auto mt-28 px-4 md:px-10 lg:px-20">
        <!-- Breadcrumb -->
        <div class="mb-6 text-gray-600 text-sm">
            <p>
                <span class="text-gray-800 ">Produk</span> /
                <span class="text-gray-800 ">{{ $produk->kategori->nama_kategori ?? 'Kategori Tidak Diketahui' }}</span> /
                <span class="text-gray-800 ">{{ $produk->nama_produk }}</span>
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-6">
            <!-- Foto Produk -->
            <div class="md:w-1/2 relative group">
                <div class="swiper mySwiper2 mb-5 rounded-lg overflow-hidden shadow-lg">
                    <div class="swiper-wrapper">
                        @foreach ($produk->portofolio as $index => $foto)
                            <div class="swiper-slide">
                                <img src="https://drive.google.com/thumbnail?id={{ $foto->foto_portofolio }}&sz=w1920-h1080"
                                    alt="Foto Produk {{ $produk->nama_produk }}"
                                    class="w-full h-[300px] sm:h-[400px] md:h-[450px] lg:h-[500px] object-cover rounded-lg">
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigasi Panah -->
                    <div
                        class="swiper-button-next bg-[#764C31] text-white w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 flex items-center justify-center rounded-full shadow-lg absolute top-1/2 right-4 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out transform hover:scale-110 hover:shadow-xl">
                    </div>
                    <div
                        class="swiper-button-prev bg-[#764C31] text-white w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 flex items-center justify-center rounded-full shadow-lg absolute top-1/2 left-4 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out transform hover:scale-110 hover:shadow-xl">
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($produk->portofolio as $index => $foto)
                            <div class="swiper-slide cursor-pointer thumbnail" data-index="{{ $index }}">
                                <img id="thumbnail-{{ $index }}"
                                    src="https://drive.google.com/thumbnail?id={{ $foto->foto_portofolio }}&sz=w1920-h1080"
                                    alt="Thumbnail {{ $produk->nama_produk }}"
                                    class="w-[80px] h-[80px] sm:w-[100px] sm:h-[100px] md:w-[120px] md:h-[120px] object-cover rounded-lg shadow-md transition-opacity duration-300 hover:opacity-80">
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
                                onclick="toggleAccordion('{{ $id }}-{{ $produk->id }}')"
                                aria-expanded="false">
                                <h3 class="text-base font-medium text-black">{{ $title }}</h3>
                                <span id="arrow-{{ $id }}-{{ $produk->id }}"
                                    class="arrow-icon w-8 h-8 flex items-center justify-center bg-[#764C31] rounded-full transition-transform duration-300 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FFF6E4]" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </button>
                            <hr class="border-t border-gray-300 max-w-[380px] mx-auto ">
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
                                    <div class="py-4">
                                        <div class="max-h-60 overflow-y-auto px-4">
                                            <ul class="list-decimal pl-6 space-y-2">
                                                <li>Mengisi formulir booking dan melakukan pembayaran DP sebesar 50% dari
                                                    harga paket sebagai tanda jadi.</li>
                                                <li>Setiap paket yang dipesan sudah termasuk 1 fotografer untuk 1 klien.
                                                </li>
                                                <li>Booking hanya diterima untuk jam yang sudah ditentukan dan wajib tepat
                                                    waktu.</li>
                                                <li>Durasi foto dihitung sejak sesi foto dimulai, dengan toleransi
                                                    keterlambatan maksimal 15 menit dari jadwal booking.</li>
                                                <li>Klien diperbolehkan mengganti dress code selama sesi berlangsung, namun
                                                    waktu tetap berjalan sesuai durasi yang telah ditentukan.</li>
                                                <li>Klien bebas memilih spot background yang tersedia di studio sesuai
                                                    keinginan.</li>
                                                <li>Semua file foto original akan dikirim dalam estimasi H+1 melalui Google
                                                    Drive. Link Drive bersifat sementara dan hanya tersedia selama 1 bulan,
                                                    sehingga klien wajib mengunduh semua file sebelum masa penyimpanan
                                                    berakhir. Jika memungkinkan, file dapat langsung dicopy melalui kabel
                                                    data pada hari H.</li>
                                                <li>Klien bertanggung jawab memilih file yang akan diedit setelah menerima
                                                    file di Drive. Editing hanya mencakup cropping dan penyesuaian tone
                                                    warna sesuai dengan ciri khas studio RPA Project.</li>
                                                <li>Estimasi waktu editing sekitar 1–2 minggu atau menyesuaikan antrean
                                                    klien.</li>
                                                <li>Pelunasan pembayaran wajib dilakukan maksimal pada hari H sebelum sesi
                                                    berakhir.</li>
                                                <li>Semua pembayaran akan hangus apabila terjadi pembatalan atau reschedule
                                                    secara sepihak dari pihak klien.</li>
                                            </ul>
                                        </div>
                                    </div>
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
    </div>
    @include('users.components.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiperTop = new Swiper('.mySwiper2', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                loop: false,
                on: {
                    slideChange: function() {
                        updateActiveThumbnail(swiperTop.activeIndex);
                    }
                }
            });

            var swiperThumbs = new Swiper('.mySwiper', {
                spaceBetween: 5,
                slidesPerView: 4,
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                slideToClickedSlide: true,
                loop: false,
            });

            swiperTop.controller.control = swiperThumbs;
            swiperThumbs.controller.control = swiperTop;

            // Klik pada thumbnail untuk mengganti foto utama
            document.querySelectorAll('.thumbnail').forEach((thumbnail, index) => {
                thumbnail.addEventListener('click', function() {
                    swiperTop.slideTo(index);
                });
            });

            function updateActiveThumbnail(activeIndex) {
                document.querySelectorAll('.thumbnail img').forEach((thumb, index) => {
                    if (index === activeIndex) {
                        thumb.classList.remove('opacity-50'); // Hilangkan efek transparan
                    } else {
                        thumb.classList.add('opacity-50'); // Tambahkan efek transparan
                    }
                });
            }

            // Set awal thumbnail pertama sebagai aktif
            updateActiveThumbnail(0);
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
