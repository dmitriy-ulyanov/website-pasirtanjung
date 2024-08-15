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
            $table->string('nama_produk');
            $table->string('sapaan');
            $table->text('nama_penjual');
            $table->text('deskripsi');
            $table->text('foto_produk');
            $table->text('tokopedia');
            $table->text('shopee');
            $table->text('whatsapp');
            $table->text('alamat');
            $table->text('maps');
            $table->text('foto_lokasi');
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
