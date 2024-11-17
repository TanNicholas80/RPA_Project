<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AddOn') }}
        </h2>
    </x-slot>

    @include('addon.components.add-addon-popup')
    @include('addon.components.edit-addon-popup')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('addon.components.show-data-addon')
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editButtons = document.querySelectorAll('[data-modal-target="edit-modal"]');

            editButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = document.querySelector('#edit-modal');
                    const addonId = button.getAttribute('data-id');
                    const nama = button.getAttribute('data-nama');
                    const keterangan = button.getAttribute('data-keterangan');
                    const produk = button.getAttribute('data-produk');
                    const harga = button.getAttribute('data-harga');

                    // Isi input modal dengan data yang diambil dari button
                    modal.querySelector('form').setAttribute('action', `/addon/${addonId}`);
                    modal.querySelector('#nama_addon').value = nama;
                    modal.querySelector('#pilih_produk').value = produk;
                    modal.querySelector('#keterangan_addon').value = keterangan;
                    modal.querySelector('#harga_addon').value = harga;
                });
            });
        });
    </script>
</x-app-layout>