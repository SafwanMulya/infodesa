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
        Schema::create('agamas', function (Blueprint $table) {
            $table->id();
            $table->string('islam')->default(0);
            $table->string('kristen')->default(0);
            $table->string('katolik')->default(0);
            $table->string('hindu')->default(0);
            $table->string('budha')->default(0);
            $table->string('konghucu')->default(0);
            $table->string('jumlah')->default(0);
            $table->string('persentase')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agamas');
    }
};
