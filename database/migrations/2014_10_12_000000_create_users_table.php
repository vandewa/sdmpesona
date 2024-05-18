<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('npwp')->nullable();
            $table->string('ktp')->nullable();
            $table->string('id_karyawan')->nullable();
            $table->string('jk')->nullable();
            $table->string('status')->nullable();
            $table->string('status_pekerjaan_id')->nullable();
            $table->string('nama_jabatan_id')->nullable();
            $table->string('tingkat_pekerjaan_awal_id')->nullable();
            $table->string('nama_jabatan_sekarang_id')->nullable();
            $table->string('tingkat_pekerjaan_sekarang_id')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->date('tgl_penetapan_gapok_awal')->nullable();
            $table->date('tgl_penetapan_jabatan_awal')->nullable();
            $table->string('gapok_awal')->nullable();
            $table->string('gapok_sekarang')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telpon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kawin_tp')->nullable();
            $table->string('anak')->nullable();
            $table->string('bank')->nullable();
            $table->string('rekening')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
