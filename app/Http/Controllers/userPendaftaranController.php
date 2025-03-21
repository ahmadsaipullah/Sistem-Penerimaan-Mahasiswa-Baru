<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userPendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with('user')->get();
        return view('pages.userpendaftaran.index', compact('pendaftarans'));
    }

    public function store(Request $request)
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

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['nama'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;

        if ($request->hasFile('sertifikat')) {
            $data['sertifikat'] = $request->file('sertifikat')->store('sertifikats', 'public');
        }

        Pendaftaran::create($data);

        toast('Data berhasil ditambah', 'success');
        return redirect()->route('userpendaftaran.index');
    }

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
        return redirect()->route('userpendaftaran.index');
    }

}
