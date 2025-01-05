<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portofolio') }}
        </h2>
    </x-slot>

    @include('portofolio.components.add-portofolio-popup')
    @include('portofolio.components.edit-portofolio-popup')
    @include('portofolio.components.delete-confirm-portofolio-popup')

    @if (session()->has('success'))
        <div id="success-message" style="display: none;">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12 2xl:ml-0 md:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="overflow-x-auto">
                    @include('portofolio.components.show-data-portofolio')
                </div>
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

            function handleEditButton(button) {
                const modal = document.querySelector('#edit-modal');
                const portoId = button.getAttribute('data-id');
                const foto_porto = button.getAttribute('data-foto');
                const produk = button.getAttribute('data-produk');
                const drive = 'https://drive.google.com/thumbnail?id=';
                const size = '&sz=w1000-h800';

                // Isi input modal dengan data yang diambil dari button
                modal.querySelector('form').setAttribute('action', `/portofolio/${portoId}`);
                modal.querySelector('#preview-image').src = drive + foto_porto + size;
                modal.querySelector('#pilih_produk').value = produk;
            }

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
                const portoId = button.getAttribute('data-id');

                // Isi input modal dengan data yang diambil dari button
                modal.querySelector('form').setAttribute('action', `/portofolio/${portoId}`);
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
