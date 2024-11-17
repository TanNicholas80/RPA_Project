<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    @include('kategori.components.add-kategori-popup')
    @include('kategori.components.edit-kategori-popup')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('kategori.components.show-data-kategori')
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editButtons = document.querySelectorAll('[data-modal-target="edit-modal"]');

            editButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = document.querySelector('#edit-modal');
                    const kategoriId = button.getAttribute('data-id');
                    const namaKategori = button.getAttribute('data-nama');

                    // Isi input modal dengan data yang diambil dari button
                    modal.querySelector('form').setAttribute('action', `/kategori/${kategoriId}`);
                    modal.querySelector('#name_kategori').value = namaKategori;
                });
            });
        });
    </script>
</x-app-layout>
