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
        Schema::create('pendidikan_umums', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang');
            $table->integer('jumlah_negeri');
            $table->integer('jumlah_swasta');
            $table->integer('jumlah_sekolah');
            $table->integer('jumlah_murid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_umums');
    }
};
