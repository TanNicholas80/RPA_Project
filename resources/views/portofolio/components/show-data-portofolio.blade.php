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
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @forelse ($portofolio as $porto)
            <div class="relative rounded-lg shadow-md overflow-hidden">
                <img src="https://drive.google.com/thumbnail?id={{ $porto->foto_portofolio }}&sz=w1000-h800"
                    alt="{{ $porto->produk->nama_produk }}" class="object-cover h-56 w-full">
                <div
                    class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-[#B2935B]/80 to-transparent p-4">
                    <h3 class="xl:text-2xl font-bold text-white text-lg">{{ $porto->produk->nama_produk }}</h3>
                </div>
                <div class="absolute top-2.5 right-3">
                    <button class="btn bg-white/50" data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                        data-id="{{ $porto->id }}" data-foto="{{ $porto->foto_portofolio }}"
                        data-produk="{{ $porto->produk_id }}" data-bs-toggle="tooltip"
                        data-bs-original-title="Edit Portofolio">
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
</section>
