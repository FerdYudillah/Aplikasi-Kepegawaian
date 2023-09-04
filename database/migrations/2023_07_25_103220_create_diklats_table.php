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
        Schema::create('diklats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_diklat', 100)->nullable();
            $table->string('penyelenggara', 100)->nullable();
            $table->string('tempat_diklat', 100)->nullable();
            $table->date('tgl_pelaksanaan', 100)->nullable();
            $table->date('tgl_selesai', 100)->nullable();
            $table->string('no_sttpl', 100)->nullable();
            $table->string('ttd_pejabat', 100)->nullable();
            $table->enum('status_diklat', ['Sudah Selesai', 'Sedang Mengikuti'])->nullable()->default('Sedang Mengikuti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diklats');
    }
};
