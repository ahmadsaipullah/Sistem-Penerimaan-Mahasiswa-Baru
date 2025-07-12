<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Assesmen;
use Illuminate\Support\Facades\Auth;

class AssesmenMahasiswaController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Ambil assesmen berdasarkan jadwal.user_id = user yg login
        $assesmens = Assesmen::whereHas('jadwal', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->with('jadwal.user')->get();

        return view('pages.assesmen.mahasiswa-index', compact('assesmens'));
    }
}
