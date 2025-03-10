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
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('foto_portofolio');
            $table->enum('status_portofolio', ['foto', 'video']);
            $table->string('nama_portofolio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolios');
    }
};
