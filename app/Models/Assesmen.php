<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesmen extends Model
{
    use HasFactory;

    protected $table = 'assesmens'; // Nama tabel

    protected $fillable = [
        'jadwal_id',
        'dokumen',
        'total_sks',
        'total_mata_kuliah',
        'total_sks_ditempuh',
        'total_mata_kuliah_ditempuh',
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
