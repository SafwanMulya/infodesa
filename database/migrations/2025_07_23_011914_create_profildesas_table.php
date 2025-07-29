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
        Schema::create('profildesas', function (Blueprint $table) {
            $table->id();
            
            $table->string('nama_desa');
            $table->string('alamat_desa');
            $table->string('kode_pos');
            $table->string('telepon');
            $table->string('email')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profildesas');
    }
  
};
