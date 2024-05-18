<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perubahan_jabatans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('nama_jabatan_lama')->nullable();
            $table->string('tingkat_pekerjaan_lama')->nullable();
            $table->date('tgl_update_jabatan_lama')->nullable();
            $table->date('tgl_update_jabatan_baru')->nullable();
            $table->integer('nama_jabatan_id')->nullable();
            $table->integer('tingkat_pekerjaan_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perubahan_jabatans');
    }
};
