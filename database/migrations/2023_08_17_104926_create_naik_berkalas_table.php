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
        Schema::create('naik_berkalas', function (Blueprint $table) {
            $table->id();
            //relasi dengan Tabel Users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //relasi dengan Tabel Users
            $table->unsignedBigInteger('gaji_id');
            $table->foreign('gaji_id')->references('id')->on('gajis')->onDelete('cascade');
            // $table->string('gaji_lama', 100)->nullable();
            $table->date('mulai_tanggal')->nullable();
            $table->date('naik_selanjutnya')->nullable();
            $table->date('tgl_usulan')->nullable();
            $table->enum('ket', ['Belum Disetujui', 'Disetujui'])->nullable()->default('Belum Disetujui');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naik_berkalas');
    }
};
