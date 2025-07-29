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
        Schema::create('suratsktms', function (Blueprint $table) {
            $table->id();

            // Data Pemohon
            $table->string('nama_lengkap');
            $table->string('nik', 20);
            $table->string('tempat_tanggal_lahir');
            $table->string('kewarganegaraan')->default('Indonesia');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('no_hp', 20);

            // Data Ayah
            $table->string('nama_ayah');
            $table->string('nik_ayah', 20);
            $table->string('ttl_ayah');
            $table->string('kewarganegaraan_ayah')->default('Indonesia');
            $table->string('agama_ayah');
            $table->string('pekerjaan_ayah');
            $table->text('alamat_ayah');

            // Data Ibu
            $table->string('nama_ibu');
            $table->string('nik_ibu', 20);
            $table->string('ttl_ibu');
            $table->string('kewarganegaraan_ibu')->default('Indonesia');
            $table->string('agama_ibu');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_ibu');

            // Upload dokumen
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kk')->nullable();

            // Status verifikasi oleh admin
            $table->enum('status', ['dalam proses', 'disetujui', 'ditolak'])->default('dalam proses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratsktms');
    }
};
