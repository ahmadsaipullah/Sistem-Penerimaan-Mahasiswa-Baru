<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Routing\Controller;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::with('Level')->get();
        $levels = Level::all();
        return view('pages.admin.index', compact('admins','levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6'],
            'level_id' => ['nullable','integer'],
            'alamat' => ['nullable', 'string'],
            'tempat_tanggal_lahir' => ['nullable', 'string'],
            'no_hp' => ['nullable', 'string', 'max:15'],
            'jenis_kelamin' => ['nullable', 'in:Laki-laki,Perempuan'],
            'pendidikan_terakhir' => ['nullable', 'string'],
            'nama_ayah' => ['nullable', 'string'],
            'nama_ibu' => ['nullable', 'string'],
            'pekerjaan_ayah' => ['nullable', 'string'],
            'pekerjaan_ibu' => ['nullable', 'string'],
            'nama_wali' => ['nullable', 'string'],
            'pekerjaan_wali' => ['nullable', 'string'],
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        User::create($data);

        toast('Data berhasil ditambah', 'success');
        return redirect()->route('admin.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'min:6'],
            'level_id' => ['nullable', 'integer'],
            'alamat' => ['nullable', 'string'],
            'tempat_tanggal_lahir' => ['nullable', 'string'],
            'no_hp' => ['nullable', 'string', 'max:15'],
            'jenis_kelamin' => ['nullable', 'in:Laki-laki,Perempuan'],
            'pendidikan_terakhir' => ['nullable', 'string'],
            'nama_ayah' => ['nullable', 'string'],
            'nama_ibu' => ['nullable', 'string'],
            'pekerjaan_ayah' => ['nullable', 'string'],
            'pekerjaan_ibu' => ['nullable', 'string'],
            'nama_wali' => ['nullable', 'string'],
            'pekerjaan_wali' => ['nullable', 'string'],
        ]);

        $admin = User::findOrFail($id);
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $admin->update($data);

        toast('Data berhasil diupdate', 'success');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        toast('Data berhasil dihapus', 'success');
        return redirect()->route('admin.index');
    }
}
