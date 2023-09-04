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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('t_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nohp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jumlah_anak')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('no_karsu')->nullable();
            $table->string('email')->unique()->nullable()->unique();
            $table->string('foto')->unique()->nullable();
            $table->enum('level', ['ADMIN', 'PEGAWAI'])->nullable()->default('PEGAWAI');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
