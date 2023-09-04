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
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id('id_pendidikan');
            //relasi dengan Tabel Users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('no_ijazah')->nullable();
            $table->date('tgl_ijazah')->nullable();
            $table->string('tingkat_pendidikan')->nullable();
            $table->string('lembaga_pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('kota')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikans');
    }
};
