<section>
    <header class="flex justify-between items-center mb-5">
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Data Produk') }}
        </h2>

        <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="btn bg-brown-700 hover:bg-brown-800"
            style="color: #FFF6E4;">
            <i class="fa-solid fa-plus"></i>
            Tambah Data Produk
        </button>
    </header>
    <hr class="mb-5">
    <div class="flex flex-col gap-5">
        <form action="{{ route('produk.search') }}" method="GET" class="w-96 ml-auto">
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
                    placeholder="Cari Nama, Harga, Kategori Produk" required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-brown-700 hover:bg-brown-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        @if ($produk->isEmpty())
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <div>
                    <span class="font-lg">Info alert!</span>
                    @if (!empty($query))
                        Tidak ada Produk yang cocok dengan "{{ $query }}".
                    @else
                        Tidak Ada Data AddOn Yang Tersedia.
                    @endif
                </div>
            </div>
        @else
            @foreach ($produk as $pr)
                <div class="flex justify-between items-center px-5 py-3.5 rounded-xl"
                    style="background-color: #F9EED8;">
                    <p class="text-xl font-medium" style="color: #A88952;">{{ $pr->nama_produk }}</p>
                    <div class="flex gap-3">
                        <button class="btn bg-inherit" data-modal-target="detail-modal" data-modal-toggle="detail-modal"
                            data-id="{{ $pr->id }}" data-kategori="{{ $pr->kategori->nama_kategori }}"
                            data-nama="{{ $pr->nama_produk }}" data-durasi="{{ $pr->durasi_foto }}"
                            data-edit="{{ $pr->edit_foto }}" data-crew="{{ $pr->total_crew }}"
                            data-cetak="{{ $pr->cetak_foto }}" data-orang="{{ $pr->total_orang }}"
                            data-harga="{{ $pr->harga_produk }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Detail Produk">
                            <i class="cursor-pointer fa-solid fa-circle-info text-xl text-lime-600"></i>
                        </button>
                        <button class="btn bg-inherit" data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                            data-id="{{ $pr->id }}" data-kategori="{{ $pr->kategori_id }}"
                            data-nama="{{ $pr->nama_produk }}" data-durasi="{{ $pr->durasi_foto }}"
                            data-edit="{{ $pr->edit_foto }}" data-crew="{{ $pr->total_crew }}"
                            data-cetak="{{ $pr->cetak_foto }}" data-orang="{{ $pr->total_orang }}"
                            data-harga="{{ $pr->harga_produk }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Edit Produk">
                            <i class="cursor-pointer fa-solid fa-pen-to-square text-xl text-yellow-600"></i>
                        </button>
                        <button type="button" class="btn bg-inherit" data-bs-toggle="tooltip"
                            data-bs-original-title="Delete Kategori" data-modal-target="delete-modal"
                            data-modal-toggle="delete-modal" data-id="{{ $pr->id }}">
                            <i class="cursor-pointer fas fa-trash text-xl text-red-600"></i>
                        </button>
                    </div>
                </div>
            @endforeach
            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $produk->links() }}
            </div>
        @endif
    </div>
</section>
