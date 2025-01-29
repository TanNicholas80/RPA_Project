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
                const nama_porto = button.getAttribute('data-nama-foto');
                const foto_porto = button.getAttribute('data-foto');
                const status_porto = button.getAttribute('data-status');
                const produk = button.getAttribute('data-produk');
                const drive = 'https://drive.google.com/thumbnail?id=';
                const size = '&sz=w1000-h800';
                const drive_video = 'https://drive.google.com/file/d/';
                const view = '/preview';
                // Perbarui elemen pratinjau berdasarkan status
                const previewImage = modal.querySelector('#preview-image');
                const previewVideo = modal.querySelector('#preview-video');

                // Isi input modal dengan data yang diambil dari button
                modal.querySelector('form').setAttribute('action', `/portofolio/${portoId}`);
                if (status_porto === 'foto') {
                    previewImage.src = drive + foto_porto + size;
                    previewImage.style.display = 'block';
                    previewVideo.style.display = 'none';
                } else if (status_porto === 'video') {
                    previewVideo.src = drive_video + foto_porto + view;
                    previewVideo.style.display = 'block';
                    previewImage.style.display = 'none';
                }
                modal.querySelector('#nama_portofolio').value = nama_porto;
                modal.querySelector('#pilih_status').value = status_porto;
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

            document.getElementById('foto_portofolio').addEventListener('change', function(event) {
                const files = event.target.files; // Ambil file yang dipilih

                // Elemen pratinjau
                const previewImage = document.getElementById('preview-image-add');
                const previewVideo = document.getElementById('preview-video-add');

                // Reset pratinjau sebelumnya
                previewImage.style.display = 'none';
                previewVideo.style.display = 'none';
                previewImage.src = '';
                previewVideo.src = '';

                if (files.length > 0) {
                    const file = files[0]; // Ambil file pertama

                    if (file.type.startsWith('image/')) {
                        // Jika file adalah gambar
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result; // Setel sumber gambar
                            previewImage.style.display = 'block'; // Tampilkan elemen gambar
                        };
                        reader.readAsDataURL(file); // Baca file sebagai Data URL
                    } else if (file.type.startsWith('video/')) {
                        // Jika file adalah video
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewVideo.src = e.target.result; // Setel sumber video
                            previewVideo.style.display = 'block'; // Tampilkan elemen video
                        };
                        reader.readAsDataURL(file); // Baca file sebagai Data URL
                    }
                }
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
