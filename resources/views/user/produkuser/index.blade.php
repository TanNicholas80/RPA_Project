@extends('layouts.user')

@section('content')
    <div class="mt-6 px-4">
        <!-- Header -->
        <div class="text-left">
            <h1 class="text-4xl font-bold text-gray-800">Produk</h1>
            <p class="text-gray-600 mt-2">Lihat dan jelajahi paket kami untuk mengabadikan momen terbaik anda.</p>
        </div>

        <!-- Filter and Search -->
        <div class="flex justify-between items-center mt-6">
            <!-- Filter Buttons -->
            <div class="flex space-x-4 overflow-x-auto">
                <button class="px-6 py-2 bg-[#764C31] text-[#FFF6E4] rounded-full focus:outline-none">
                    Semua Produk
                </button>
                @foreach ($kategoris as $kategori)
                    <button
                        class="px-6 py-2 bg-[#FFF6E4] text-[#3E3A33] rounded-full hover:bg-[#E9E0CE] border border-[#764C31]/50 hover:border-opacity-50">
                        {{ $kategori->nama_kategori }}
                    </button>
                @endforeach
            </div>

            <!-- Search Box -->
            <div class="relative flex items-center">
                <button class="absolute left-2 text-[#764C31] opacity-80">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35m1.4-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <input type="text" placeholder="Cari"
                    class="px-4 py-2 pl-8 border border-[#764C31]/50 rounded-full focus:outline-none focus:ring-0 focus:border-[#764C31] w-28 focus:w-48 focus:placeholder-transparent focus:shadow-[0_0_8px_4px_#FFEBD0] transition-all duration-300 ease-in-out">
            </div>
        </div>

        <!-- Produk Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8">
            @foreach ($kategoris as $kategori)
                @foreach ($kategori->produk as $produk)
                    <div class="border border-[#764C31]/50 rounded-xl shadow-md overflow-hidden">
                        <img src="https://via.placeholder.com/300" alt="{{ $produk->nama_produk }}"
                            class="w-full h-48 object-cover">
                        <div class="p-4 bg-[#FFFBF4]">
                            <p class="text-sm text-gray-800 bg-[#DFBE91] px-3 py-1 rounded-full inline-block font-medium">
                                {{ $kategori->nama_kategori }}
                            </p>
                            <h3 class="text-[21px] font-semibold text-gray-800 mt-3">{{ $produk->nama_produk }}</h3>
                            <a href="{{ route('produkuser.show', $produk->id) }}"
                                class="text-[#3E3A33]/70 font-bold mt-2 underline block">Selengkapnya</a>

                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
