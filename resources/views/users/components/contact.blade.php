<section id="kontak" class="flex flex-col gap-12 mt-12">
    <div class="flex flex-col gap-3">
        <h2 class="text-4xl font-bold text-center">Kontak Kami</h2>
        <p class="text-center text-lg font-semibold">Hubungi kami jika Anda memiliki pertanyaan atau ingin membuat
            janji, kami siap membatu!</p>
    </div>

    <div class="flex flex-col md:flex-row justify-center gap-16">
        <!-- Instagram -->
        <a href="https://www.instagram.com/studiofotorpaproject"
            class="w-60 h-40 rounded-lg flex flex-col items-center justify-center p-6 bg-yellow-50 shadow-md social-card"
            target="_blank">
            <div class="p-2 rounded-full mb-3 card-icon">
                <img src="{{ asset('assets/img/ig.png') }}" alt="Instagram" class="w-20 h-20">
            </div>
            <p class="text-gray-800 font-normal username"> @studiophotorpaproject </p>
        </a>
        <!-- WhatsApp -->
        <a href="https://wa.me/6285641574777"
            class="w-60 h-40 rounded-lg flex flex-col items-center justify-center p-6 bg-yellow-50 shadow-md social-card"
            target="_blank">
            <div class="p-2 rounded-full mb-3 card-icon">
                <img src="{{ asset('assets/img/wa.png') }}" alt="WhatsApp" class="w-20 h-20">
            </div>
            <p class="text-gray-800 font-normal username">085641574777</p>
        </a>
        <!-- Facebook -->
        <a href="https://www.facebook.com/RPAprojectFOTOVIDIO"
            class="w-60 h-40 rounded-lg flex flex-col items-center justify-center p-6 bg-yellow-50 shadow-md social-card"
            target="_blank">
            <div class="p-2 rounded-full mb-3 card-icon">
                <img src="{{ asset('assets/img/fb.png') }}" alt="Facebook" class="w-20 h-20">
            </div>
            <p class="text-gray-800 font-normal username">RPA project</p>
        </a>
    </div>
    <div class="flex justify-center items-center mx-16">
        <a href="https://maps.app.goo.gl/e55Mkkohw97rF7uXA" target="_blank" class="relative map-link">
            <img src="{{ asset('assets/img/map.png') }}" alt="Maps" class="w-full h-full map-img">
            <div class="absolute inset-0 bg-[#FFF6E4]/50 rounded-lg map-overlay"></div>
            <div class="absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-2/2 text-center w-full map-text">
                <p class="font-semibold">Kunjungi Kami di RPA Project Photo Studio. Kami Tunggu Kedatangan Anda!</p>
            </div>
        </a>
    </div>
</section>
