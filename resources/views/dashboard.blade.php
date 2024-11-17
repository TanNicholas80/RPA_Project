<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center items-center gap-10">
        <div class="p-5 rounded-lg flex items-center" style="background-color: #B2935B;">
            <img src="{{ asset('assets/img/press_kit.png') }}" alt="product">
            <div class="flex flex-col ml-5">
                @if ($totalProduk == 0)
                <p class="text-2xl font-extrabold text-white">0</p>
                @else
                <p class="text-2xl font-extrabold text-white">{{ $totalProduk }}</p>
                @endif
                <p class="text-2xl font-extrabold text-white">PRODUK</p>
            </div>
        </div>
        <div class="p-5 rounded-lg flex items-center" style="background-color: #B2935B;">
            <img src="{{ asset('assets/img/portofolio.png') }}" alt="portofolio">
            <div class="flex flex-col ml-5">
                @if ($totalPortofolio == 0)
                <p class="text-2xl font-extrabold text-white">0</p>
                @else
                <p class="text-2xl font-extrabold text-white">{{ $totalPortofolio }}</p>
                @endif
                <p class="text-2xl font-extrabold text-white">PORTOFOLIO</p>
            </div>
        </div>
        <div class="p-5 rounded-lg flex items-center" style="background-color: #B2935B;">
            <img src="{{ asset('assets/img/add_on.png') }}" alt="addon">
            <div class="flex flex-col ml-5">
                @if ($totalAddOn == 0)
                <p class="text-2xl font-extrabold text-white">0</p>
                @else
                <p class="text-2xl font-extrabold text-white">{{ $totalAddOn }}</p>
                @endif
                <p class="text-2xl font-extrabold text-white">TAMBAHAN</p>
            </div>
        </div>
        <div class="p-5 rounded-lg flex items-center" style="background-color: #B2935B;">
            <img src="{{ asset('assets/img/add_on.png') }}" alt="kategori">
            <div class="flex flex-col ml-5">
                @if ($totalKategori == 0)
                <p class="text-2xl font-extrabold text-white">0</p>
                @else
                <p class="text-2xl font-extrabold text-white">{{ $totalKategori }}</p>
                @endif
                <p class="text-2xl font-extrabold text-white">KATEGORI</p>
            </div>
        </div>
    </div>
</x-app-layout>
