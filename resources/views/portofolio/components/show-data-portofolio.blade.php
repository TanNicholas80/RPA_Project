<section>
    <header class="flex justify-between items-center mb-5">
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Data Portofolio') }}
        </h2>

        <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="btn bg-brown-700 hover:bg-brown-800"
            style="color: #FFF6E4;">
            <i class="fa-solid fa-plus"></i>
            Tambah Data Portofolio
        </button>
    </header>
    <hr class="mb-5">
    <form action="{{ route('portofolio.search') }}" method="GET" class="w-96 ml-auto mb-6">
        <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" name="search" id="default-search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Cari Nama Produk Portofolio" required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-brown-700 hover:bg-brown-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @forelse ($portofolio as $porto)
            <div class="relative rounded-lg shadow-md overflow-hidden">
                @if ($porto->status_portofolio === 'foto')
                    <img src="https://drive.google.com/thumbnail?id={{ $porto->foto_portofolio }}&sz=w1000-h800"
                        alt="{{ $porto->produk->nama_produk }}" class="object-cover h-56 w-full">
                @elseif ($porto->status_portofolio === 'video')
                    <iframe title="Drive Video" class="object-cover h-56 w-full" src="https://drive.google.com/file/d/{{ $porto->foto_portofolio }}/preview" allowfullscreen></iframe>
                @endif
                <div
                    class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-[#B2935B]/80 to-transparent p-4" style="pointer-events: none;">
                    <h3 class="xl:text-2xl font-bold text-white text-lg">{{ $porto->produk->nama_produk }}</h3>
                </div>
                <div class="absolute top-2.5 right-3">
                    <button class="btn bg-white/50" data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                        data-id="{{ $porto->id }}" data-foto="{{ $porto->foto_portofolio }}"
                        data-status="{{ $porto->status_portofolio }}" data-produk="{{ $porto->produk_id }}"
                        data-bs-toggle="tooltip" data-bs-original-title="Edit Portofolio">
                        <i class="cursor-pointer fa-solid fa-pen-to-square text-lg xl:text-xl text-yellow-600"></i>
                    </button>
                    <button type="button" class="btn bg-white/50 ml-1" data-bs-toggle="tooltip"
                        data-bs-original-title="Delete Portofolio" data-modal-target="delete-modal"
                        data-modal-toggle="delete-modal" data-id="{{ $porto->id }}">
                        <i class="cursor-pointer fas fa-trash text-lg xl:text-xl text-red-600"></i>
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center p-4 text-gray-700">
                Tidak ada data portofolio.
            </div>
        @endforelse
    </div>
    <!-- Pagination -->
    <div class="mt-6">
        {{ $portofolio->links() }}
    </div>
</section>
