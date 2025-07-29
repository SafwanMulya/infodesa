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
        Schema::create('datadesas', function (Blueprint $table) {
            $table->id();
            $table->string('penduduk_laki_laki')->default(0);
            $table->string('penduduk_perempuan')->default(0);
            $table->string('penduduk_jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datadesas');
    }
};
