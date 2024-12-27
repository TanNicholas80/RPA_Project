<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 2xl:ml-0 md:ml-64 flex justify-center items-center gap-10 md:flex-wrap">
        <div class="w-72 p-5 rounded-lg flex items-center" style="background-color: #B2935B;">
            <img src="{{ asset('assets/img/press_kit.png') }}" alt="product">
            <div class="flex flex-col ml-5">
                @if ($totalProduk == 0)
                <p class="2xl:text-2xl font-extrabold text-white text-xl">0</p>
                @else
                <p class="2xl:text-2xl font-extrabold text-white text-xl">{{ $totalProduk }}</p>
                @endif
                <p class="2xl:text-2xl font-extrabold text-white text-xl">PRODUK</p>
            </div>
        </div>
        <div class="w-72 p-5 rounded-lg flex items-center" style="background-color: #B2935B;">
            <img src="{{ asset('assets/img/portofolio.png') }}" alt="portofolio">
            <div class="flex flex-col ml-5">
                @if ($totalPortofolio == 0)
                <p class="2xl:text-2xl font-extrabold text-white text-xl">0</p>
                @else
                <p class="2xl:text-2xl font-extrabold text-white text-xl">{{ $totalPortofolio }}</p>
                @endif
                <p class="2xl:text-2xl font-extrabold text-white text-xl">PORTOFOLIO</p>
            </div>
        </div>
        <div class="w-72 p-5 rounded-lg flex items-center" style="background-color: #B2935B;">
            <img src="{{ asset('assets/img/add_on.png') }}" alt="addon">
            <div class="flex flex-col ml-5">
                @if ($totalAddOn == 0)
                <p class="2xl:text-2xl font-extrabold text-white text-xl">0</p>
                @else
                <p class="2xl:text-2xl font-extrabold text-white text-xl">{{ $totalAddOn }}</p>
                @endif
                <p class="2xl:text-2xl font-extrabold text-white text-xl">TAMBAHAN</p>
            </div>
        </div>
        <div class="w-72 p-5 rounded-lg flex items-center" style="background-color: #B2935B;">
            <img src="{{ asset('assets/img/add_on.png') }}" alt="kategori">
            <div class="flex flex-col ml-5">
                @if ($totalKategori == 0)
                <p class="2xl:text-2xl font-extrabold text-white text-xl">0</p>
                @else
                <p class="2xl:text-2xl font-extrabold text-white text-xl">{{ $totalKategori }}</p>
                @endif
                <p class="2xl:text-2xl font-extrabold text-white text-xl">KATEGORI</p>
            </div>
        </div>
    </div>
</x-app-layout>
