<section id="produk" class="bg-cover bg-center flex flex-col gap-10 items-center py-12 px-6"
    style="background-image: url('{{ asset('assets/img/bg-resp.png') }}');"
    class="sm:bg-[url('{{ asset('assets/img/bg-product.png') }}')]">
    <div class="text-center">
        <h2 class="text-4xl font-bold">Produk</h2>
        <p class="text-base md:text-lg font-semibold">Lihat dan Eksplorasi Pilihan Paket Fotografi Kami</p>
    </div>
    <!-- Grid Container -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-10">
        <!-- Card -->
        <a href="{{ route('produkuser') }}" class="flex flex-col items-center bg-white rounded-xl shadow-lg p-6 hover:scale-105 transition w-36 h-36 md:w-52 md:h-56">
            <img src="{{ asset('assets/img/service-1.png') }}" alt="Family & Group" class="w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 object-contain mb-3 sm:mb-4">
            <p class="font-semibold text-center text-xs md:text-lg">Family & Group</p>
        </a>
        <a href="{{ route('produkuser') }}" class="flex flex-col items-center bg-white rounded-xl shadow-lg p-6 hover:scale-105 transition w-36 h-36 md:w-52 md:h-56">
            <img src="{{ asset('assets/img/service-2.png') }}" alt="Personal & Couple" class="w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 object-contain mb-3 sm:mb-4">
            <p class="font-semibold text-center text-xs md:text-lg">Personal & Couple</p>
        </a>
        <a href="{{ route('produkuser') }}" class="flex flex-col items-center bg-white rounded-xl shadow-lg p-6 hover:scale-105 transition w-36 h-36 md:w-52 md:h-56">
            <img src="{{ asset('assets/img/service-3.png') }}" alt="Maternity & Baby" class="w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 object-contain mb-3 sm:mb-4">
            <p class="font-semibold text-center text-xs md:text-lg">Maternity & Baby</p>
        </a>
        <a href="{{ route('produkuser') }}" class="flex flex-col items-center bg-white rounded-xl shadow-lg p-6 hover:scale-105 transition w-36 h-36 md:w-52 md:h-56">
            <img src="{{ asset('assets/img/service-4.png') }}" alt="Wedding" class="w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 object-contain mb-3 sm:mb-4">
            <p class="font-semibold text-center text-xs md:text-lg">Wedding</p>
        </a>
        <a href="{{ route('produkuser') }}" class="flex flex-col items-center bg-white rounded-xl shadow-lg p-6 hover:scale-105 transition w-36 h-36 md:w-52 md:h-56">
            <img src="{{ asset('assets/img/service-5.png') }}" alt="Business" class="w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 object-contain mb-3 sm:mb-4">
            <p class="font-semibold text-center text-xs md:text-lg">Business</p>
        </a>
        <a href="{{ route('produkuser') }}" class="flex flex-col items-center bg-white rounded-xl shadow-lg p-6 hover:scale-105 transition w-36 h-36 md:w-52 md:h-56">
            <img src="{{ asset('assets/img/service-6.png') }}" alt="Special Event" class="w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 object-contain mb-3 sm:mb-4">
            <p class="font-semibold text-center text-xs md:text-lg">Special Event</p>
        </a>
    </div>
</section>
