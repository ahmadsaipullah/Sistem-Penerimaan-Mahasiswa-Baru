<?php


namespace App\Http\Controllers;

use App\Models\Assesmen;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssesmenController extends Controller
{

public function index()
{
    $assesmens = Assesmen::with('jadwal.user')->get(); // Tampilkan data
    $jadwals = Jadwal::with('user')->where('status', 'Approve')->get(); // Jadwal yang disetujui
    $usedJadwalIds = Assesmen::pluck('jadwal_id')->toArray(); // ID jadwal yang sudah dipakai assesmen

    return view('pages.assesmen.index', compact('assesmens', 'jadwals', 'usedJadwalIds'));
}




    public function create()
    {

    }



    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwals,id',
            'dokumen' => 'required|file|mimes:pdf,doc,docx',
            'total_sks' => 'required|integer|min:0',
            'total_mata_kuliah' => 'required|integer|min:0',
            'total_sks_ditempuh' => 'required|integer|min:0',
            'total_mata_kuliah_ditempuh' => 'required|integer|min:0',
        ]);

        $path = $request->file('dokumen')->store('dokumen-assesmen', 'public');

        Assesmen::create([
            'jadwal_id' => $request->jadwal_id,
            'dokumen' => $path,
            'total_sks' => $request->total_sks,
            'total_mata_kuliah' => $request->total_mata_kuliah,
            'total_sks_ditempuh' => $request->total_sks_ditempuh,
            'total_mata_kuliah_ditempuh' => $request->total_mata_kuliah_ditempuh,
        ]);

        toast('Assesmen berhasil ditambahkan', 'success');
        return redirect()->route('assesmen.index');
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        $assesmen = Assesmen::findOrFail($id);

        $request->validate([
            'jadwal_id' => 'required|exists:jadwals,id',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx',
            'total_sks' => 'required|integer|min:0',
            'total_mata_kuliah' => 'required|integer|min:0',
            'total_sks_ditempuh' => 'required|integer|min:0',
            'total_mata_kuliah_ditempuh' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('dokumen')) {
            if (Storage::disk('public')->exists($assesmen->dokumen)) {
                Storage::disk('public')->delete($assesmen->dokumen);
            }
            $assesmen->dokumen = $request->file('dokumen')->store('dokumen-assesmen', 'public');
        }

        $assesmen->update([
            'jadwal_id' => $request->jadwal_id,
            'total_sks' => $request->total_sks,
            'total_mata_kuliah' => $request->total_mata_kuliah,
            'total_sks_ditempuh' => $request->total_sks_ditempuh,
            'total_mata_kuliah_ditempuh' => $request->total_mata_kuliah_ditempuh,
        ]);

        toast('Assesmen berhasil diupdate', 'success');
        return redirect()->route('assesmen.index');
    }


    public function destroy($id)
    {
        $assesmen = Assesmen::findOrFail($id);
        if (Storage::disk('public')->exists($assesmen->dokumen)) {
            Storage::disk('public')->delete($assesmen->dokumen);
        }
        $assesmen->delete();

        toast('Assesmen berhasil dihapus', 'success');
        return redirect()->back();
    }



}
