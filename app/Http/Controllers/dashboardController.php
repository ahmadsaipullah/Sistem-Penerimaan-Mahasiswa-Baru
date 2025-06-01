<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Registrasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\BuktiPembayaran;
use App\Models\PengajuanJadwal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // Mengambil jumlah mahasiswa yang terdaftar
    //     $totalMahasiswa = Registrasi::count();

    //     // Mengambil jumlah pendaftaran baru
    //     $totalPendaftaran = Pendaftaran::count();

    //     // Mengambil jumlah pengajuan jadwal yang belum terverifikasi
    //     $totalPengajuanJadwal = PengajuanJadwal::where('status', 'Pending')->count();

    //     // Mengambil jumlah bukti pembayaran yang telah diverifikasi
    //     $totalBuktiPembayaran = BuktiPembayaran::where('status', 'Terverifikasi')->count();

    //     return view('pages.dashboard', compact(
    //         'totalMahasiswa',
    //         'totalPendaftaran',
    //         'totalPengajuanJadwal',
    //         'totalBuktiPembayaran'
    //     ));
    // }
public function index()
{
    $user = auth()->user();
    $userId = $user->id;

    $pendaftaran = null;

    if ($user->level_id == 3) {
        // Ambil data pendaftaran untuk user level 3
        $pendaftaran = \App\Models\Pendaftaran::where('user_id', $userId)->first();
    }

    // Data dashboard untuk Admin (level_id == 1)
    $totalPendaftar = null;
    $totalUploadDokumen = null;
    $totalPembayaran = null;
    $pendingDokumen = null;
    $pendingPembayaran = null;

    if ($user->level_id == 1 || $user->level_id == 2) {
        $totalPendaftar = \App\Models\Pendaftaran::count();
        $totalUploadDokumen = \App\Models\UploadDokumen::count();
        $totalPembayaran = \App\Models\Pembayaran::count();

        $pendingDokumen = \App\Models\UploadDokumen::where('status', 'Pending')->count();
        $pendingPembayaran = \App\Models\Pembayaran::where('nim', 'waiting approval')->count();
    }

    return view('pages.dashboard', compact(
        'pendaftaran',
        'totalPendaftar',
        'totalUploadDokumen',
        'totalPembayaran',
        'pendingDokumen',
        'pendingPembayaran'
    ));
}








}
