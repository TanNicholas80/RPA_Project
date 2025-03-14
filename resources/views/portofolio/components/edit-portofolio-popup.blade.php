<div id="edit-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Portofolio
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="edit-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nama_portofolio"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama / Deskripsi
                            Portofolio</label>

                        <input type="text" name="nama_portofolio" id="nama_portofolio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukan Nama / Deskripsi Portofolio" required>
                    </div>
                    <div class="col-span-2">
                        <label for="foto_portofolio_edit"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Foto /
                            Video</label>
                        <div class="relative inline-block">
                            <img id="preview-image" alt="Preview" class="w-full max-w-sm h-52 rounded-lg mb-5">
                            <iframe id="preview-video" title="Drive Video" class="w-full max-w-sm h-52 rounded-lg mb-5" allowfullscreen></iframe>
                            <label for="foto_portofolio_edit"
                                class="flex items-center px-4 py-2 bg-blue-100 text-blue-900 font-medium rounded-lg cursor-pointer hover:bg-blue-200">
                                <i class="fa-solid fa-image mr-2"></i>
                                Pilih Foto / Video
                            </label>
                            <input type="file" name="foto_portofolio" id="foto_portofolio_edit" accept="image/*,video/*"
                                class="hidden">
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="status_portofolio"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Portofolio</label>

                        <select id="status_portofolio" name="status_portofolio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option id="pilih_status" selected>Pilih Status</option>
                            <option value="foto">Foto</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="produk"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Produk</label>

                        <select id="produk" name="produk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option id="pilih_produk" selected>Produk Saat Ini</option>
                            @foreach ($produks as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-brown-700 hover:bg-brown-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>