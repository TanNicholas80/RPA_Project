<section>
    <header class="flex justify-between items-center mb-5">
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Data AddOn') }}
        </h2>

        <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="btn bg-brown-700 hover:bg-brown-800"
            style="color: #FFF6E4;">
            <i class="fa-solid fa-plus"></i>
            Tambah Data AddOn
        </button>
    </header>
    <hr class="mb-5">
    <div class="flex flex-col gap-5">
        @if ($addon->isEmpty())
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <div>
                    <span class="font-lg">Info alert!</span> Tidak Ada Data AddOn Yang Tersedia.
                </div>
            </div>
        @else
            @foreach ($addon as $add)
                <div class="flex justify-between items-center px-5 py-3.5 rounded-xl"
                    style="background-color: #F9EED8;">
                    <p class="text-xl font-medium" style="color: #A88952;">{{ $add->nama_addon }} -
                        Rp. {{ $add->harga_addon }}</p>
                    <div class="flex">
                        <button class="btn bg-inherit" data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                            data-id="{{ $add->id }}" data-nama="{{ $add->nama_addon }}"
                            data-keterangan="{{ $add->keterangan_addon }}" data-produk="{{ $add->produk_id }}"
                            data-harga="{{ $add->harga_addon }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Edit Tambahan">
                            <i class="cursor-pointer fa-solid fa-pen-to-square text-xl text-yellow-600"></i>
                        </button>
                        <button type="button" class="btn bg-inherit" data-bs-toggle="tooltip"
                            data-bs-original-title="Delete Tambahan" data-modal-target="delete-modal"
                            data-modal-toggle="delete-modal" data-id="{{ $add->id }}">
                            <i class="cursor-pointer fas fa-trash text-xl text-red-600"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
