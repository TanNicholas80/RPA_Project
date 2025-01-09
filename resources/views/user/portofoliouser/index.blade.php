@section('content')
@include('users.components.navbar')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="mt-6 px-4">
    <!-- Header -->
    <div class="text-left">
        <h1 class="text-4xl font-bold text-gray-800">Portofolio</h1>
        <p class="text-gray-600 mt-2">Lihat hasil momen-momen indah yang telah kami abadikan untuk klien.</p>
    </div>

    <!-- Filter and Search -->
    <div class="flex justify-between items-center mt-6">
        <!-- Filter Buttons -->
        <div class="flex space-x-4 overflow-x-auto">
            <button class="px-6 py-2 bg-[#764C31] text-[#FFF6E4]  rounded-full  focus:outline-none">
                All Product
            </button>
            @foreach ($kategoris as $kategori)
            <button class="px-6 py-2 bg-[#FFF6E4] text-[#3E3A33] rounded-full hover:bg-[#E9E0CE] border border-[#764C31] border-opacity-40 hover:border-opacity-50">
    {{ $kategori->nama_kategori }}
</button>

            @endforeach
        </div>
 <!-- Search Button -->
 <div class="relative flex items-center">
            <button class="absolute left-2 text-[#764C31] opacity-80">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.4-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <input type="text" placeholder="Cari" class="px-4 py-2 pl-8 border border-[#764C31] border-opacity-50 rounded-full focus:outline-none focus:ring-0 focus:border-[#764C31] focus:ring-0 w-28 focus:w-48 focus:placeholder-transparent focus:shadow-[0_0_8px_4px_#FFEBD0] transition-all duration-300 ease-in-out">
        </div>
    </div>

        <div class=" flex justify-center w-full">
    <div class="flex border-gray-300">
        <!-- Tab Foto -->
        <button
            id="tabFoto"
            class="tab-button px-4 py-2 w-40 text-black font-semibold border-b-2 border-black focus:outline-none transition-all">
            Foto
        </button>
        <!-- Tab Video -->
        <button
            id="tabVideo"
            class="tab-button px-4 py-2 w-40 text-gray-500 font-semibold border-b-2 border-gray-300 focus:outline-none hover:text-black hover:border-black transition-all">
            Video
        </button>
    </div>
</div>

<script>
    // JavaScript untuk logika tab aktif
    const tabFoto = document.getElementById("tabFoto");
    const tabVideo = document.getElementById("tabVideo");

    // Fungsi untuk mengatur tab aktif
    function setActiveTab(activeTab, inactiveTab) {
        // Tambahkan kelas Tailwind untuk tab aktif
        activeTab.classList.add("text-black", "border-black");
        activeTab.classList.remove("text-gray-500", "border-gray-300");

        // Hapus kelas Tailwind untuk tab tidak aktif
        inactiveTab.classList.add("text-gray-500", "border-gray-300");
        inactiveTab.classList.remove("text-black", "border-black");
    }

    // Event listener untuk mengubah tab
    tabFoto.addEventListener("click", () => setActiveTab(tabFoto, tabVideo));
    tabVideo.addEventListener("click", () => setActiveTab(tabVideo, tabFoto));
</script>
