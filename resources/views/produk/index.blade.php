<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    @include('produk.components.detail-produk-popup')
    @include('produk.components.add-produk-popup')
    @include('produk.components.edit-produk-popup')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('produk.components.show-data-produk')
            </div>
        </div>
    </div>
    <script>
        // detail Produk
        document.addEventListener('DOMContentLoaded', () => {
            const detailButtons = document.querySelectorAll('[data-modal-target="detail-modal"]');
            const editButtons = document.querySelectorAll('[data-modal-target="edit-modal"]');

            detailButtons.forEach(button => {
                button.addEventListener('click', () => {
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
                });
            });

            editButtons.forEach(button => {
                button.addEventListener('click', () => {
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
                });
            });
        });
    </script>
</x-app-layout>
