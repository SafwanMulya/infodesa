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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kode_layanan')->nullable();
            $table->string('singkatan')->nullable();
            $table->string('slug')->nullable();
            $table->string('template_surat')->nullable();
            $table->string('status')->nullable();
            $table->text('keterangan')->nullable();
            $table->tinyInteger('dilihat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
