<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userPembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('user')
            ->where('user_id', Auth::id())
            ->get();
        return view('pages.useruploadpembayaran.index', compact('pembayarans'));
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
        $pembayaran->status = 'Pending'; // Reset status
        $pembayaran->save();

          // Tampilkan toast
          toast('Data berhasil diupdate', 'success');
        return redirect()->back();
    }
}
