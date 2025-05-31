<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::all();
        return view('pages.pembayaran.index', compact('pembayarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'nominal' => 'required|string',
        ]);

        $filePath = $request->file('bukti_pembayaran')->store('uploads/bukti_pembayaran', 'public');

        Pembayaran::create([
            'user_id' => Auth::id(),
            'bukti_pembayaran' => $filePath,
            'nominal' => $request->nominal,
            'nim' => 'waiting approval', // Default value
            'keterangan' => $request->keterangan ?? 'Tidak Ada',
            'status' => 'Pending'
        ]);

          // Tampilkan toast
          toast('Data berhasil diupload', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nominal' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $filePath = $request->file('bukti_pembayaran')->store('uploads/bukti_pembayaran', 'public');
            $pembayaran->bukti_pembayaran = $filePath;
        }

        $pembayaran->nominal = $request->nominal;
        $pembayaran->keterangan = $request->keterangan ?? 'Tidak Ada';
        $pembayaran->save();

          // Tampilkan toast
          toast('Data berhasil diupdate', 'success');
        return redirect()->back();
    }
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Hapus file jika ada
        if ($pembayaran->bukti_pembayaran) {
            Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
        }

        // Hapus data dari database
        $pembayaran->delete();

        // Tampilkan toast
        toast('Data berhasil dihapus', 'success');

        return redirect()->back();
    }

 public function approve(Request $request, $id)
{
    $request->validate([
        'nim' => 'required|string|max:255',
    ]);

    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->status = $request->status;
    $pembayaran->nim = $request->nim;
    $pembayaran->save();

     // Tampilkan toast
        toast('Data berhasil approve', 'success');
    return redirect()->route('pembayaran.index')->with('success', 'Pembayaran disetujui.');
}

public function rejected(Request $request, $id)
{
    $request->validate([
        'keterangan' => 'required|string',
    ]);

    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->status = $request->status;
    $pembayaran->keterangan = $request->keterangan;
    $pembayaran->save();

     // Tampilkan toast
        toast('Data berhasil direjected', 'success');
    return redirect()->route('pembayaran.index')->with('success', 'Pembayaran ditolak dengan keterangan.');
}



}
