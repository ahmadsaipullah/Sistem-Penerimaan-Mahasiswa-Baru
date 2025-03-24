<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadDokumen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UploadDokumenController extends Controller
{
    public function index()
    {
        $upload_dokumens = UploadDokumen::with('user')->get();
        return view('pages.upload_dokumen.index', compact('upload_dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ktp' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'kartu_keluarga' => 'required|mimes:pdf|max:2048',
            'akte_kelahiran' => 'required|mimes:pdf|max:2048',
            'ijazah' => 'required|mimes:pdf|max:2048',
            'paklaring' => 'nullable|mimes:pdf|max:2048',
            'curiculum_vitae' => 'required|mimes:pdf|max:2048',
            'form_aplikasi_rpl' => 'required|mimes:pdf|max:2048',
            'bukti_pendaftaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $dokumen = UploadDokumen::firstOrNew(['user_id' => $user->id]);

        if ($request->hasFile('ktp')) {
            $dokumen->ktp = $request->file('ktp')->store('uploads/ktp', 'public');
        }
        if ($request->hasFile('kartu_keluarga')) {
            $dokumen->kartu_keluarga = $request->file('kartu_keluarga')->store('uploads/kartu_keluarga', 'public');
        }
        if ($request->hasFile('akte_kelahiran')) {
            $dokumen->akte_kelahiran = $request->file('akte_kelahiran')->store('uploads/akte_kelahiran', 'public');
        }
        if ($request->hasFile('ijazah')) {
            $dokumen->ijazah = $request->file('ijazah')->store('uploads/ijazah', 'public');
        }
        if ($request->hasFile('paklaring')) {
            $dokumen->paklaring = $request->file('paklaring')->store('uploads/paklaring', 'public');
        }
        if ($request->hasFile('curiculum_vitae')) {
            $dokumen->curiculum_vitae = $request->file('curiculum_vitae')->store('uploads/curiculum_vitae', 'public');
        }
        if ($request->hasFile('form_aplikasi_rpl')) {
            $dokumen->form_aplikasi_rpl = $request->file('form_aplikasi_rpl')->store('uploads/form_aplikasi_rpl', 'public');
        }
        if ($request->hasFile('bukti_pendaftaran')) {
            $dokumen->bukti_pendaftaran = $request->file('bukti_pendaftaran')->store('uploads/bukti_pendaftaran', 'public');
        }

        $dokumen->status = 'Pending';
        $dokumen->save();

        toast('Dokumen berhasil diupload', 'success');
        return redirect()->route('pages.upload_dokumen.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $dokumen = UploadDokumen::findOrFail($id);
        $dokumen->update(['status' => $request->status]);

        toast('Status berhasil diperbarui', 'success');
        return redirect()->route('pages.upload_dokumen.index');
    }

    public function destroy($id)
    {
        $dokumen = UploadDokumen::findOrFail($id);
        Storage::disk('public')->delete([
            $dokumen->ktp,
            $dokumen->kartu_keluarga,
            $dokumen->akte_kelahiran,
            $dokumen->ijazah,
            $dokumen->paklaring,
            $dokumen->curiculum_vitae,
            $dokumen->form_aplikasi_rpl,
            $dokumen->bukti_pendaftaran
        ]);
        $dokumen->delete();

        toast('Dokumen berhasil dihapus', 'success');
        return redirect()->route('pages.upload_dokumen.index');
    }
}
