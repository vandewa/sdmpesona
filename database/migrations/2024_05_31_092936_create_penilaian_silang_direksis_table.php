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
        Schema::create('penilaian_silang_direksis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('penilai')->nullable();
            $table->date('tgl')->nullable();
            $table->longText('penilaian_kualitatif')->nullable();
            $table->string('jobdesk')->nullable();
            $table->string('inovasi')->nullable();
            $table->string('kedisiplinan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_silang_direksis');
    }
};
