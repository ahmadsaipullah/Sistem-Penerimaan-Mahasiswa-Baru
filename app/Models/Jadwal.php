<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

        protected $table = 'jadwals'; // Nama tabel

    protected $fillable = [
        'user_id',
        'jadwal_wawancara',
        'keterangan',
        'status',
    ];

    // Relasi ke tabel Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
