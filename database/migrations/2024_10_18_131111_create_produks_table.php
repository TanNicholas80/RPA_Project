<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_produk');
            $table->string('durasi_foto');
            $table->string('edit_foto');
            $table->string('total_crew');
            $table->string('cetak_foto');
            $table->string('harga_produk');
            $table->string('total_orang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
