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
           Schema::create('assesmens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwals')->onDelete('cascade');
            $table->string('dokumen'); // 1. Upload dokumen
            $table->integer('total_sks'); // 2. Total SKS
            $table->integer('total_mata_kuliah'); // 3. Total Mata Kuliah
            $table->integer('total_sks_ditempuh'); // 4. Total SKS yang ditempuh
            $table->integer('total_mata_kuliah_ditempuh'); // 5. Total Mata Kuliah yang ditempuh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assesmens');
    }
};
