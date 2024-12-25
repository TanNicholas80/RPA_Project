<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    @include('kategori.components.add-kategori-popup')
    @include('kategori.components.edit-kategori-popup')
    @include('kategori.components.delete-confirm-kategori-popup')

    @if (session()->has('success'))
        <div id="success-message" style="display: none;">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('kategori.components.show-data-kategori')
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Fungsi untuk menampilkan SweetAlert
            function showSuccessAlert(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: message
                });
            }

            // Fungsi untuk mengelola tombol edit
            function handleEditButton(button) {
                const modal = document.querySelector('#edit-modal');
                const kategoriId = button.getAttribute('data-id');
                const namaKategori = button.getAttribute('data-nama');

                // Isi input modal dengan data yang diambil dari button
                modal.querySelector('form').setAttribute('action', `/kategori/${kategoriId}`);
                modal.querySelector('#name_kategori').value = namaKategori;
            }

            // Cari semua tombol edit
            const editButtons = document.querySelectorAll('[data-modal-target="edit-modal"]');

            // Tambahkan event listener ke setiap tombol
            editButtons.forEach(button => {
                button.addEventListener('click', () => {
                    handleEditButton(button);
                });
            });

            // Fungsi untuk mengelola tombol delete
            function handleDeleteButton(button) {
                const modal = document.querySelector('#delete-modal');
                const kategoriId = button.getAttribute('data-id');

                // Isi input modal dengan data yang diambil dari button
                modal.querySelector('form').setAttribute('action', `/kategori/${kategoriId}`);
            }

            // Cari Semua Tombol Delete
            const deleteButtons = document.querySelectorAll('[data-modal-target="delete-modal"]');

            // Tambahkan event listener ke setiap tombol
            deleteButtons.forEach(button => {
                button.addEventListener('click', () => {
                    handleDeleteButton(button);
                });
            });

            // Panggil fungsi showSuccessAlert jika ada pesan sukses
            const messageElement = document.getElementById('success-message');
            const message = messageElement.textContent;
            if (message) {
                showSuccessAlert(message);
            }
        });
    </script>
</x-app-layout>
