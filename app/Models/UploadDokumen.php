<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadDokumen extends Model
{
    use HasFactory;

    protected $table = 'upload_dokumens'; // Nama tabel

    protected $fillable = [
        'user_id',
        'ktp',
        'kartu_keluarga',
        'akte_kelahiran',
        'ijazah',
        'paklaring',
        'curiculum_vitae',
        'form_aplikasi_rpl',
        'bukti_pendaftaran',
        'status',
    ];

    // Relasi ke tabel Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
