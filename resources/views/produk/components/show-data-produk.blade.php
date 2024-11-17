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
        @if ($produk->isEmpty())
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <div>
                    <span class="font-lg">Info alert!</span> Tidak Ada Data Produk Yang Tersedia.
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
                        <span>
                            <form action="{{ route('produk.destroy', $pr->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-inherit" data-bs-toggle="tooltip"
                                    data-bs-original-title="Delete Produk">
                                    <i class="cursor-pointer fas fa-trash text-xl text-red-600"></i>
                                </button>
                            </form>
                        </span>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
