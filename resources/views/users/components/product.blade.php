<section id="produk" class="bg-cover bg-center flex flex-col gap-12 items-center py-12"
    style="background-image: url('{{ asset('assets/img/bg-product.png') }}');">
    <div class="flex flex-col gap-3 justify-center items-center">
        <h2 class="text-4xl font-bold">Produk</h2>
        <p class="text-lg font-semibold">Lihat dan Eksplorasi Pilihan Paket Fotografi Kami</p>
    </div>
    <!-- Grid Container -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-y-10 gap-x-24">
        <!-- Card 1 -->
        <a href="#" class="flex flex-col items-center bg-white rounded-lg shadow-lg p-6 card-product">
            <img src="{{ asset('assets/img/service-1.png') }}" alt="Family & Group" class="w-24 h-24 object-contain mb-4">
            <p class="font-semibold text-lg">Family & Group</p>
        </a>
        <!-- Card 2 -->
        <a href="#" class="flex flex-col items-center bg-white rounded-lg shadow-lg p-6 card-product">
            <img src="{{ asset('assets/img/service-2.png') }}" alt="Personal & Couple"
                class="w-24 h-24 object-contain mb-4">
            <p class="font-semibold text-lg">Personal & Couple</p>
        </a>
        <!-- Card 3 -->
        <a href="#" class="flex flex-col items-center bg-white rounded-lg shadow-lg p-6 card-product">
            <img src="{{ asset('assets/img/service-3.png') }}" alt="Maternity & Baby"
                class="w-24 h-24 object-contain mb-4">
            <p class="font-semibold text-lg">Maternity & Baby</p>
        </a>
        <!-- Card 4 -->
        <a href="#" class="flex flex-col items-center bg-white rounded-lg shadow-lg p-6 card-product">
            <img src="{{ asset('assets/img/service-4.png') }}" alt="Wedding" class="w-24 h-24 object-contain mb-4">
            <p class="font-semibold text-lg">Wedding</p>
        </a>
        <!-- Card 5 -->
        <a href="#" class="flex flex-col items-center bg-white rounded-lg shadow-lg p-6 card-product">
            <img src="{{ asset('assets/img/service-5.png') }}" alt="Business" class="w-24 h-24 object-contain mb-4">
            <p class="font-semibold text-lg">Business</p>
        </a>
        <!-- Card 6 -->
        <a href="#" class="flex flex-col items-center bg-white rounded-lg shadow-lg p-6 card-product">
            <img src="{{ asset('assets/img/service-6.png') }}" alt="Special Event"
                class="w-24 h-24 object-contain mb-4">
            <p class="font-semibold text-lg">Special Event</p>
        </a>
    </div>
</section>
