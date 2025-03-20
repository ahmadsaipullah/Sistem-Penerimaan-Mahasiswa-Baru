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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('level_id');
            $table->string('alamat')->default('-');
            $table->string('tempat_tanggal_lahir')->default('-');
            $table->string('no_hp')->default('-');
            $table->string('jenis_kelamin')->default('-');
            $table->string('pendidikan_terakhir')->default('-');
            $table->string('nama_ayah')->default('-');
            $table->string('nama_ibu')->default('-');
            $table->string('pekerjaan_ayah')->default('-');
            $table->string('pekerjaan_ibu')->default('-');
            $table->string('nama_wali')->default('-');
            $table->string('pekerjaan_wali')->default('-');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
