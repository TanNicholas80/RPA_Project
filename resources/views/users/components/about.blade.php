<section id="tentangKami" class="flex flex-col gap-8 py-12 px-4  mx-4 md:mx-8">
    <!-- Judul Section -->
    <div class="flex flex-col gap-3 justify-center items-center">
        <h2 class="text-4xl font-bold text-center">Tentang Kami</h2>
        <p class="text-center  text-xs md:text-lg font-semibold">Mengenal RPA Project Photo Studio</p>
    </div>

    <!-- Container Card -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <!-- Card 1: Siapa Kami -->
        <div class="card-about relative bg-white shadow-lg rounded-lg p-6">
            <!-- Bulatan di Atas -->
            <div class="absolute -top-6 left-5 bg-[#FFF6E4] w-12 h-12 rounded-full flex items-center justify-center icon-about">
                <img src="{{ asset('assets/img/about-icon-1.png') }}" alt="icon-about-1" class="w-6 h-6">
            </div>
            <h3 class="text-xl font-semibold text-left mb-4">Siapa Kami?</h3>
            <p class="text-sm text-gray-600 leading-relaxed text-justify">
                RPA Project Photo Studio adalah tempat kreatif yang terdiri dari tim fotografer dan videografer profesional, yang berkomitmen untuk menangkap momen-momen berharga dalam hidup, mulai dari momen pribadi hingga acara profesional, dengan kreativitas, ketelitian, dan perhatian pada detail.
            </p>
        </div>

        <!-- Card 2: Misi Kami -->
        <div class="card-about relative bg-white shadow-lg rounded-lg p-6">
            <!-- Bulatan di Atas -->
            <div class="absolute -top-6 left-5 bg-[#FFF6E4] w-12 h-12 rounded-full flex items-center justify-center icon-about">
                <img src="{{ asset('assets/img/about-icon-2.png') }}" alt="icon-about-2" class="w-6 h-6">
            </div>
            <h3 class="text-xl font-semibold text-left mb-4">Misi Kami</h3>
            <p class="text-sm text-gray-600 leading-relaxed text-justify">
                Misi kami adalah menciptakan kenangan abadi dengan menyediakan layanan fotografi dan videografi yang terbaik, menggabungkan visi artistik dengan keahlian teknis untuk memastikan setiap momen tertangkap dan terjaga dengan sempurna bagi klien.
            </p>
        </div>

        <!-- Card 3: Syarat dan Ketentuan -->
        <div class="card-about relative bg-white shadow-lg rounded-lg p-6">
            <!-- Bulatan di Atas -->
            <div class="absolute -top-6 left-5 bg-[#FFF6E4] w-12 h-12 rounded-full flex items-center justify-center icon-about">
                <img src="{{ asset('assets/img/about-icon-3.png') }}" alt="icon-about-3" class="w-6 h-6">
            </div>
            <h3 class="text-xl font-semibold text-left mb-4">Syarat dan Ketentuan</h3>
            <ul class="text-sm text-gray-600 leading-relaxed list-decimal list-inside">
                <li>Harga sewaktu-waktu bisa berubah disesuaikan dengan kondisi paket pemotretan</li>
                <li>Harga paket belum termasuk biaya make up dan kostum</li>
                <li>Untuk pemotretan di luar Kota Semarang, seluruh biaya akomodasi ditanggung oleh klien</li>
                <li>Akomodasi pemotretan wedding di luar Semarang dikenakan biaya Rp 1.000.000</li>
                <li>Booking date: minimal 50% dari harga paket</li>
                <li>Foto perbesaran dipilih oleh klien</li>
                <li>Foto yang akan diedit, dipilih oleh Imagine Photography</li>
            </ul>
        </div>
    </div>
</section>