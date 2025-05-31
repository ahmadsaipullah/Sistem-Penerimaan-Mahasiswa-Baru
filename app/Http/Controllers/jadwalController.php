<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class jadwalController extends Controller
{
      public function index()
    {
        $jadwals = Jadwal::all();
        return view('pages.jadwal.index', compact('jadwals'));
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
        $jadwal->save();

          // Tampilkan toast
          toast('Data berhasil diupdate', 'success');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // Hapus data dari database
        $jadwal->delete();

        // Tampilkan toast
        toast('Data berhasil dihapus', 'success');

        return redirect()->back();
    }

 public function approve(Request $request, $id)
{
  $request->validate([
        'keterangan' => 'required|string',
    ]);

    $jadwal = Jadwal::findOrFail($id);
    $jadwal->status = $request->status;
    $jadwal->keterangan = $request->keterangan;
    $jadwal->save();

     // Tampilkan toast
        toast('Data berhasil approve', 'success');
    return redirect()->route('jadwal.index');
}

public function rejected(Request $request, $id)
{
    $request->validate([
        'keterangan' => 'required|string',
    ]);

    $jadwal = Jadwal::findOrFail($id);
    $jadwal->status = $request->status;
    $jadwal->keterangan = $request->keterangan;
    $jadwal->save();

    // Tampilkan toast
    toast('Data berhasil direjected', 'success');
    return redirect()->route('jadwal.index');
}
}
