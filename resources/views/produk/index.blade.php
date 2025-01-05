<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    @include('produk.components.detail-produk-popup')
    @include('produk.components.add-produk-popup')
    @include('produk.components.edit-produk-popup')
    @include('produk.components.delete-confirm-produk-popup')

    @if (session()->has('success'))
        <div id="success-message" style="display: none;">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12 2xl:ml-0 md:ml-64">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="overflow-x-auto">
                    @include('produk.components.show-data-produk')
                </div>
            </div>
        </div>
    </div>
    <script>
        // detail Produk
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
                // Ambil data dari atribut data-*
                const modal = document.querySelector('#edit-modal');
                const produkId = button.getAttribute('data-id');
                const nama = button.getAttribute('data-nama');
                const durasi = button.getAttribute('data-durasi');
                const kategori = button.getAttribute('data-kategori');
                const edit = button.getAttribute('data-edit');
                const crew = button.getAttribute('data-crew');
                const cetak = button.getAttribute('data-cetak');
                const orang = button.getAttribute('data-orang');
                const harga = button.getAttribute('data-harga');

                // Isi modal dengan data yang diambil
                modal.querySelector('form').setAttribute('action', `/produk/${produkId}`);
                modal.querySelector('#nama_produk').value = nama;
                modal.querySelector('#durasi_foto').value = durasi;
                modal.querySelector('#kategori_produk').value = kategori;
                modal.querySelector('#edit_foto').value = edit;
                modal.querySelector('#total_crew').value = crew;
                modal.querySelector('#cetak_foto').value = cetak;
                modal.querySelector('#harga_produk').value = harga;
                modal.querySelector('#total_orang').value = orang;
            }

            const editButtons = document.querySelectorAll('[data-modal-target="edit-modal"]');

            // Tambahkan event listener ke setiap tombol
            editButtons.forEach(button => {
                button.addEventListener('click', () => {
                    handleEditButton(button);
                });
            });

            // Fungsi untuk mengelola tombol edit
            function handleDetailButton(button) {
                // Ambil data dari atribut data-*
                const id = button.getAttribute('data-id');
                const nama = button.getAttribute('data-nama');
                const durasi = button.getAttribute('data-durasi');
                const kategori = button.getAttribute('data-kategori');
                const edit = button.getAttribute('data-edit');
                const crew = button.getAttribute('data-crew');
                const cetak = button.getAttribute('data-cetak');
                const orang = button.getAttribute('data-orang');
                const harga = button.getAttribute('data-harga');

                // Isi modal dengan data yang diambil
                document.querySelector('.modal-title').textContent = `${nama}`;
                document.querySelector('.modal-body').innerHTML = `
                <p><strong>Durasi Foto:</strong> ${durasi}</p>
                <p><strong>Kategori Foto:</strong> ${kategori}</p>
                <p><strong>Edit Foto:</strong> ${edit}</p>
                <p><strong>Total Crew:</strong> ${crew} orang</p>
                <p><strong>Cetak Foto:</strong> ${cetak}</p>
                <p><strong>Total Orang:</strong> ${orang} orang</p>
                <p><strong>Harga Produk:</strong> Rp. ${harga}</p>
            `;
            }

            const detailButtons = document.querySelectorAll('[data-modal-target="detail-modal"]');

            // Tambahkan event listener ke setiap tombol
            detailButtons.forEach(button => {
                button.addEventListener('click', () => {
                    handleDetailButton(button);
                });
            });

            // Fungsi untuk mengelola tombol edit
            function handleDeleteButton(button) {
                const modal = document.querySelector('#delete-modal');
                const produkId = button.getAttribute('data-id');

                // Isi input modal dengan data yang diambil dari button
                modal.querySelector('form').setAttribute('action', `/produk/${produkId}`);
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
