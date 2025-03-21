<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'asal_sekolah_universitas',
        'alamat_sekolah_universitas',
        'nis_nim',
        'nomor_ijasah',
        'tahun_lulus',
        'program_studi_tujuan',
        'program_studi_asal',
        'jenjang',
        'program_kelas',
        'pekerjaan',
        'perusahaan',
        'alamat_perusahaan',
        'lama_bekerja',
        'deskripsi_pekerjaan',
        'sertifikat',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
