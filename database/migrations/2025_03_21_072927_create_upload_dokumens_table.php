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
        Schema::create('upload_dokumens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Dokumen yang harus diunggah
            $table->string('ktp');
            $table->string('kartu_keluarga');
            $table->string('akte_kelahiran');
            $table->string('ijazah');
            $table->string('paklaring')->nullable();
            $table->string('curiculum_vitae');
            $table->string('form_aplikasi_rpl');
            $table->string('bukti_pendaftaran');


            $table->string('status')->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_dokumens');
    }
};
