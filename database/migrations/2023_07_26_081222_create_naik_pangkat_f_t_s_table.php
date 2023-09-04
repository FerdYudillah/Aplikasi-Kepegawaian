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
        Schema::create('naik_pangkat_f_t_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('pangkat_id');
            $table->foreign('pangkat_id')->references('id_pangkat')->on('pangkats')->onDelete('cascade');
            $table->date('mulai_tanggal')->nullable();
            $table->date('naik_selanjutnya')->nullable();
            $table->date('tgl_usulan')->nullable();
            $table->enum('ket', ['Belum Disetujui', 'Disetujui'])->nullable()->default('Belum Disetujui');
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naik_pangkat_f_t_s');
    }
};
