<section>
    <header class="flex justify-between items-center mb-5">
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Data Kategori') }}
        </h2>

        <button data-modal-target="add-modal" data-modal-toggle="add-modal" class="btn bg-brown-700 hover:bg-brown-800"
            style="color: #FFF6E4;">
            <i class="fa-solid fa-plus"></i>
            Tambah Data Kategori
        </button>
    </header>
    <hr class="mb-5">
    <div class="flex flex-col gap-5">
        @if ($kategori->isEmpty())
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <div>
                    <span class="font-lg">Info alert!</span> Tidak Ada Data Kategori Yang Tersedia.
                </div>
            </div>
        @else
            @foreach ($kategori as $kat)
                <div class="flex justify-between items-center px-5 py-3.5 rounded-xl"
                    style="background-color: #F9EED8;">
                    <p class="text-xl font-medium" style="color: #A88952;">{{ $kat->nama_kategori }}</p>
                    <div class="flex">
                        <button class="btn bg-inherit" data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                            data-id="{{ $kat->id }}" data-nama="{{ $kat->nama_kategori }}" data-bs-toggle="tooltip"
                            data-bs-original-title="Edit Kategori">
                            <i class="cursor-pointer fa-solid fa-pen-to-square text-xl text-yellow-600"></i>
                        </button>
                        <span>
                            <form action="{{ route('kategori.destroy', $kat->id) }}" method="POST"
                                style="display:inline;" class="mx-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-inherit" data-bs-toggle="tooltip"
                                    data-bs-original-title="Delete Kategori">
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
