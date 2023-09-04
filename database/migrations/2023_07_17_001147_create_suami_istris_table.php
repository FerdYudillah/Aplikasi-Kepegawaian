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
        Schema::create('suami_istris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('nama_si', 100)->nullable();
            $table->string('status_si', 100)->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->string('t_lahir', 100)->nullable();
            $table->date('tgl_lahir', 100)->nullable();
            $table->string('status_tunjangan', 100)->nullable();
            $table->string('umur', 100)->nullable();
            $table->string('no_hp', 100)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suami_istris');
    }
};
