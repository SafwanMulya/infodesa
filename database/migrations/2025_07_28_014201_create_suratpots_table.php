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
        Schema::create('suratpots', function (Blueprint $table) {
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
            $table->string('umur', 20);
            $table->string('kewarganegaraan_ayah')->default('Indonesia');
            $table->string('pekerjaan_ayah');
            $table->text('alamat_ayah');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratpots');
    }
};
