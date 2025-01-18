@extends('layouts.user')

@section('content')
<div class="container mx-auto mt-10">
    @foreach ($kategoris as $kategori)
        @foreach ($kategori->produk as $produk)
            <!-- Breadcrumb -->
            <div class="mb-6 text-gray-600">
                <p class="text-sm">
                    <span class="text-gray-800 font-semibold">Produk</span> /
                    <span class="text-gray-800 font-semibold">{{ $kategori->nama_kategori ?? 'Kategori Tidak Diketahui' }}</span> /
                    <span class="text-gray-800 font-semibold">{{ $produk->nama_produk }}</span>
                </p>
            </div>

            <!-- Kontainer Produk -->
            <div id="produk-{{ $produk->id }}" >
                <!-- Kontainer Utama -->
                <div class="flex flex-col md:flex-row gap-8 items-start">
                    <!-- Gambar Produk -->
                    <div class="w-full md:w-1/3">
                        <img src="https://via.placeholder.com/300" alt="{{ $produk->nama_produk }}" class="w-full rounded-lg shadow-md">
                    </div>

                    <!-- Informasi Produk -->
                    <div class="w-full md:w-2/3">
                        <p class="font-bold text-gray-800 bg-[#DFBE91] py-2 px-4 rounded-full inline-block">
                            {{ $kategori->nama_kategori }}
</p>
<p class="text-2xl text-gray-700 font-semibold mt-4"> {{ $produk->nama_produk}}</p>

                        <p class="text-2xl text-gray-700 font-semibold mt-4">Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }}</p>

                        <!-- Accordion -->  
                        <div class="mt-6">
                            @foreach (['detail' => 'Detail', 'aturan' => 'Aturan Pemesanan', 'tambahan' => 'Tambahan'] as $id => $title)
                            <div class="mb-4 border border-[#000000] rounded-[16px] max-w-[500px]">
    <button 
        class="w-full text-left px-4 py-3 flex justify-between items-center focus:outline-none transition-all duration-300" 
        onclick="toggleAccordion('{{ $id }}-{{ $produk->id }}')" 
        aria-expanded="false">
        
        <h3 class="text-base font-medium">{{ $title }}</h3>
        
        <!-- Panah dalam lingkaran -->
        <span id="arrow-{{ $id }}-{{ $produk->id }}" 
              class="arrow-icon w-8 h-8 flex items-center justify-center bg-[#764C31] rounded-full transition-transform duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FFF6E4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </span>
    </button>

    <hr class="border-t border-gray-300 max-w-[450px] mx-auto ">

    <div id="{{ $id }}-{{ $produk->id }}" class="accordion-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-white text-gray-700">
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
                                                        <p class="text-sm text-gray-700">Rp {{ number_format($addon->harga_addon ?? 0, 0, ',', '.') }}</p>
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
                    </div>
                </div>

<!-- Tombol Pesan -->
<div class="mt-6 flex justify-center">
    <a href="https://wa.me/6285641574777" 
       class="bg-[#764C31] text-[#FFF6E4] w-[243px] h-[56px] flex items-center justify-center rounded-[10px] text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105">
        Klik di Sini Untuk Memesan
    </a>
</div>


                <!-- Galeri Produk -->
                <div class="mt-8">
                    <div class="grid grid-cols-5 gap-4">
                        @forelse ($produk->galeri ?? [] as $gambar)
                            <img src="{{ asset($gambar->url ?? 'images/default-image.jpg') }}" alt="Gambar {{ $loop->index + 1 }}" class="w-full h-24 object-cover rounded-md shadow-md">
                        @empty
                            <img src="https://via.placeholder.com/150" alt="Gambar Galeri Dummy" class="w-full h-24 object-cover rounded-md shadow-md">
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>

<script>
   
   function toggleAccordion(id) {
    const element = document.getElementById(id);
    if (!element) {
        console.error("Element not found: ", id);
        return;
    }

    const button = element.previousElementSibling;
    const arrow = document.getElementById("arrow-" + id);
    
    if (!button || !arrow) {
        console.error("Arrow or button not found for: ", id);
        return;
    }

    const isOpen = element.classList.contains("max-h-[1000px]");

    // Toggle class untuk efek smooth transition
    element.classList.toggle("max-h-0", isOpen);
    element.classList.toggle("max-h-[1000px]", !isOpen);
    element.classList.toggle("py-4", !isOpen);

    // Toggle rotasi panah
    arrow.classList.toggle("rotate-180", !isOpen);

    // Aksesibilitas
    button.setAttribute("aria-expanded", !isOpen);
}


</script>s
@endsection
