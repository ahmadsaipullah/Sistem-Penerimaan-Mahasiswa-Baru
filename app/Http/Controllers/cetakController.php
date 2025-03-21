<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Pendaftaran;

class cetakController extends Controller
{
    public function exportPDF($id = null)
    {
        if ($id) {
            // Export per user
            $pendaftarans = Pendaftaran::where('id', $id)->get();
            $title = "Detail Pendaftaran";
        } else {
            // Export semua data
            $pendaftarans = Pendaftaran::all();
            $title = "Laporan Pendaftaran Mahasiswa";
        }

        $pdf = PDF::loadView('pages.cetakpdf', compact('pendaftarans', 'title'))->setPaper('A4', 'portrait');
        return $pdf->download('pendaftaran.pdf');
    }
}
