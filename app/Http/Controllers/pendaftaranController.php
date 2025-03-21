<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Routing\Controller;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::with('user')->get();
        return view('pages.pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'asal_sekolah_universitas' => ['required', 'string'],
            'alamat_sekolah_universitas' => ['required', 'string'],
            'nis_nim' => ['required', 'string'],
            'nomor_ijasah' => ['required', 'string'],
            'tahun_lulus' => ['required', 'digits:4'],
            'program_studi_tujuan' => ['required', 'string'],
            'program_studi_asal' => ['required', 'string'],
            'jenjang' => ['required', 'string'],
            'program_kelas' => ['required', 'string'],
            'pekerjaan' => ['nullable', 'string'],
            'perusahaan' => ['nullable', 'string'],
            'alamat_perusahaan' => ['nullable', 'string'],
            'lama_bekerja' => ['nullable', 'integer'],
            'deskripsi_pekerjaan' => ['nullable', 'string'],
            'sertifikat' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('sertifikat')) {
            if ($pendaftaran->sertifikat) {
                Storage::disk('public')->delete($pendaftaran->sertifikat);
            }
            $data['sertifikat'] = $request->file('sertifikat')->store('sertifikats', 'public');
        }

        $pendaftaran->update($data);

        toast('Data berhasil diupdate', 'success');
        return redirect()->route('pendaftaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        if ($pendaftaran->sertifikat) {
            Storage::disk('public')->delete($pendaftaran->sertifikat);
        }
        $pendaftaran->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('pendaftaran.index');
    }
}
