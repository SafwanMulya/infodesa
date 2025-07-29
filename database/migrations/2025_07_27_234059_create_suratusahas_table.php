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
       Schema::create('suratusahas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('nik', 20);
        $table->string('tempat_tanggal_lahir');
        $table->string('jenis_kelamin');
        $table->string('kewarganegaraan')->default('Indonesia');
        $table->string('agama');
        $table->string('pekerjaan');
        $table->text('alamat');
        $table->string('no_hp', 20);
        $table->string('email')->nullable();
        $table->string('nama_usaha');
        $table->string('jenis_usaha');
        $table->string('waktu usaha');
        $table->string('foto_ktp')->nullable();
        $table->string('foto_usaha')->nullable();
        $table->enum('status', ['dalam proses', 'disetujui', 'ditolak'])->default('dalam proses');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suratusahas', function (Blueprint $table) {
        $table->dropColumn('status');
    });
    }
};
