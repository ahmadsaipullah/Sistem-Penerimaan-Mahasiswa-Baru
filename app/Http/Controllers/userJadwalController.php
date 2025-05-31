<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userJadwalController extends Controller
{
        public function index()
    {
        $jadwals = Jadwal::with('user')
            ->where('user_id', Auth::id())
            ->get();
        return view('pages.userjadwal.index', compact('jadwals'));
    }

      public function store(Request $request)
    {
        $request->validate([
            'jadwal_wawancara' => 'required|string',
        ]);


        Jadwal::create([
            'user_id' => Auth::id(),
            'jadwal_wawancara' => $request->jadwal_wawancara,
            'keterangan' => $request->keterangan ?? 'Tidak Ada',
            'status' => 'Pending'
        ]);

          // Tampilkan toast
          toast('Data berhasil diupload', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'jadwal_wawancara' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $jadwal->jadwal_wawancara = $request->jadwal_wawancara;
        $jadwal->keterangan = $request->keterangan ?? 'Tidak Ada';
        $jadwal->status = 'Pending'; // Reset status
        $jadwal->save();

          // Tampilkan toast
          toast('Data berhasil diupdate', 'success');
        return redirect()->back();
    }
}
