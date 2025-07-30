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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained();
            $table->string('nik_pemohon')->nullable();
            $table->string('kode_tiket')->nullable();
            $table->string('nama_pemohon')->nullable();
            $table->string('status')->nullable();
            $table->string('surat_docx')->nullable();
            $table->string('surat_tte')->nullable();
            $table->string('surat_pdf')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->datetime('tte_pada')->nullable();
            $table->datetime('tanggal_cetak')->nullable();
            $table->string('alamat_pemohon')->nullable();
            $table->string('nohp')->nullable();
            $table->json('data_permohonan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
