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
        Schema::create('perubahan_gajis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('gapok_sebelum')->nullable();
            $table->string('gapok_baru')->nullable();
            $table->date('tgl_gaji_baru')->nullable();
            $table->date('tgl_gaji_lama')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perubahan_gajis');
    }
};
