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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('gapok')->nullable();
            $table->string('honor_siaran')->nullable();
            $table->string('tunjangan_pendidikan')->nullable();
            $table->string('tunjangan_masa_kerja')->nullable();
            $table->string('kpi')->nullable();
            $table->string('kehadiran')->nullable();
            $table->string('lembur')->nullable();
            $table->string('uang_makan_parttimer')->nullable();
            $table->string('lain_lain')->nullable();
            $table->string('fee')->nullable();
            $table->date('tanggal_penggajian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
