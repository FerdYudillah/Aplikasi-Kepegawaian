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
        Schema::create('kepegawaians', function (Blueprint $table) {
            $table->id();
            //relasi dengan Tabel Users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('jabatan')->nullable();
            $table->string('jenis_jabatan')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('golongan')->nullable();
            $table->string('nomor_sk_cpns')->unique()->nullable();
            $table->date('tgl_sk_cpns')->unique()->nullable();
            $table->string('nomor_sk_pns')->unique()->nullable();
            $table->date('tgl_sk_pns')->unique()->nullable();
            $table->string('no_karpeg', 100)->unique()->nullable();
            $table->string('status_pegawai', 100)->nullable()->default('Aktif');
            $table->string('masa_kerja', 100)->nullable();
            $table->string('gaji', 100)->nullable();
            $table->string('satuan_kerja', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepegawaians');
    }
};
