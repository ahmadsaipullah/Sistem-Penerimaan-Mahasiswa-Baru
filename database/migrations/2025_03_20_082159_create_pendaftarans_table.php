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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('email');
            $table->string('asal_sekolah_universitas');
            $table->string('alamat_sekolah_universitas');
            $table->string('nis_nim');
            $table->string('nomor_ijasah');
            $table->year('tahun_lulus');
            $table->string('program_studi_tujuan');
            $table->string('program_studi_asal');
            $table->string('jenjang');
            $table->string('program_kelas');
            $table->string('pekerjaan')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->integer('lama_bekerja')->nullable();
            $table->text('deskripsi_pekerjaan')->nullable();
            $table->string('sertifikat')->nullable(); // Upload Sertifikat
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
