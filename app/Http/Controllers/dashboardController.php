<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrasi;
use App\Models\Pendaftaran;
use App\Models\PengajuanJadwal;
use App\Models\BuktiPembayaran;

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
        return view('pages.dashboard');
}

}
