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

        <!-- Kontainer Produk -->
        <div class="md:flex items-start">
            <!-- Foto Produk -->
            <div class="md:w-1/2">
                <div>
                    <!-- Foto Utama -->
                    <div class="relative group">
                        <img id="foto-utama-{{ $produk->id }}"
                            src="https://drive.google.com/thumbnail?id={{ $produk->portofolio->first()->foto_portofolio }}&sz=w1920-h1080"
                            alt="Foto Utama Produk {{ $produk->nama_produk }}"
                            class="w-full max-h-[450px] object-cover rounded-lg shadow-md">

                        <!-- Panah Kiri -->
                        <button
                            class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-[#764C31] text-[#FFF6E4] w-10 h-10 flex items-center justify-center rounded-full shadow-md hover:scale-110 transition opacity-0 group-hover:opacity-100"
                            onclick="geserFoto(-1, '{{ $produk->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <!-- Panah Kanan -->
                        <button
                            class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-[#764C31] text-[#FFF6E4] w-10 h-10 flex items-center justify-center rounded-full shadow-md hover:scale-110 transition opacity-0 group-hover:opacity-100"
                            onclick="geserFoto(1, '{{ $produk->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Thumbnail Foto -->
                    <div class="mt-4 flex gap-4 overflow-x-auto">
                        @forelse ($produk->portofolio as $index => $foto)
                            <div class="relative">
                                <img src="https://drive.google.com/thumbnail?id={{ $foto->foto_portofolio }}&sz=w1000-h800"
                                    alt="Foto {{ $loop->index + 1 }}"
                                    class="w-20 h-20 object-cover rounded-md shadow-md cursor-pointer thumbnail {{ $loop->first ? 'active' : '' }}"
                                    onclick="ubahFotoUtama('{{ $foto->foto_portofolio }}', 'foto-utama-{{ $produk->id }}', {{ $index }}, '{{ $produk->id }}')">

                                <!-- Overlay jika tidak aktif -->
                                <div
                                    class="overlay absolute inset-0 bg-white opacity-40 rounded-md pointer-events-none {{ $loop->first ? 'hidden' : '' }}">
                                </div>
                            </div>
                        @empty
                            <img src="https://via.placeholder.com/150" alt="Foto Galeri Dummy"
                                class="w-20 h-20 object-cover rounded-md shadow-md">
                        @endforelse
                    </div>

                </div>
            </div>

            <!-- Informasi Produk -->
            <div class="md:w-1/2 md:pl-10">
                <p class="font-bold text-gray-800 bg-[#DFBE91] py-2 px-4 rounded-full inline-block">
                    {{ $produk->kategori->nama_kategori }}</p>
                <h1 class="text-3xl text-gray-800 font-bold mt-4">{{ $produk->nama_produk }}</h1>
                <p class="text-2xl text-gray-700 font-semibold mt-4">Rp
                    {{ number_format($produk->harga ?? 0, 0, ',', '.') }}</p>
                <div class="mt-6">
                    @foreach (['detail' => 'Detail', 'aturan' => 'Aturan Pemesanan', 'tambahan' => 'Tambahan'] as $id => $title)
                        <div class="mb-4 border border-[#000000] rounded-[16px] max-w-[500px]">
                            <button
                                class="w-full text-left px-4 py-3 flex justify-between items-center focus:outline-none transition-all duration-300"
                                onclick="toggleAccordion('{{ $id }}-{{ $produk->id }}')"
                                aria-expanded="false">
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

        <script>
            // Fungsi untuk mengubah gambar utama
            function ubahFotoUtama(fotoId, fotoUtamaId, index, produkId) {
                const fotoUtama = document.getElementById(fotoUtamaId);
                const thumbnails = document.querySelectorAll(`#foto-utama-${produkId} ~ .thumbnail`);
                const overlays = document.querySelectorAll(`#foto-utama-${produkId} ~ .overlay`);

                // Update foto utama
                const urlResolusiTinggi = `https://drive.google.com/thumbnail?id=${fotoId}&sz=w1920-h1080`;
                fotoUtama.src = urlResolusiTinggi;

                // Update thumbnail aktif
                thumbnails.forEach((thumbnail, i) => {
                    if (i === index) {
                        thumbnail.classList.add('active');
                        overlays[i].classList.add('hidden');
                    } else {
                        thumbnail.classList.remove('active');
                        overlays[i].classList.remove('hidden');
                    }
                });

                currentFotoIndex = index; // Simpan index aktif
            }

            let currentFotoIndex = 0; // Index foto aktif

            // Fungsi untuk menggeser foto kiri atau kanan
            function geserFoto(direction, produkId) {
                const thumbnails = document.querySelectorAll(`#foto-utama-${produkId} ~ .thumbnail`);
                const totalFoto = thumbnails.length;

                if (totalFoto === 0) return; // Tidak ada foto, tidak perlu geser

                // Hitung index baru berdasarkan arah
                currentFotoIndex = (currentFotoIndex + direction + totalFoto) % totalFoto;

                // Panggil fungsi ubahFotoUtama untuk memperbarui gambar utama
                const thumbnailAktif = thumbnails[currentFotoIndex];
                const fotoId = thumbnailAktif.src.split('id=')[1].split('&')[0]; // Ambil ID dari URL thumbnail
                ubahFotoUtama(fotoId, `foto-utama-${produkId}`, currentFotoIndex, produkId);
            }

            // Fungsi untuk toggle accordion
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
