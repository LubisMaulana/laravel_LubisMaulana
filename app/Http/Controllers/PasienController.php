<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(){
        $listRS = RumahSakit::orderBy('nama', 'asc')->get();
        return view('pasien.view',[
            'title'=>'CRUD Pasien | View',
            'page' => 'Administrasi Pasien',
            'titleHeader' => 'Data Pasien',
            'aksi' => 'Tambah Data',
            'pasiens' => Pasien::orderByDesc('updated_at')->get(),
            'count' => 1,
            'listRS' => $listRS
        ]);
    }

    public function pageAdd(){
        $listRS = RumahSakit::orderBy('nama', 'asc')->get();
        return view('pasien.add',[
            'title'=>'CRUD Pasien | Add',
            'page' => 'Add Pasien',
            'titleHeader' => 'Tambah Data Pasien',
            'aksi' => 'Kembali',
            'listRS' => $listRS
        ]);
    }

    public function add(Request $request){
        $credentials = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'rs_id' => 'required|exists:rumah_sakits,id'
        ]);

        Pasien::create($credentials);
        return redirect()->intended('pasien')->with('success', 'Data berhasil ditambahkan.');
    }

    public function pageEdit(Pasien $pasien){
        $listRS = RumahSakit::orderBy('nama', 'asc')->get();
        return view('pasien.edit',[
            'title'=>'CRUD Pasien | Edit',
            'page' => 'Edit Pasien',
            'titleHeader' => 'Edit Data Pasien',
            'aksi' => 'Kembali',
            'pasien' => $pasien,
            'listRS' => $listRS
        ]);
    }

    public function edit(Pasien $pasien, Request $request){
        $credentials = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'rs_id' => 'required|exists:rumah_sakits,id'
        ]);

        $pasien->update($credentials);
        return back()->with('success', 'Data berhasil di update.');
    }

    public function destroy(Pasien $pasien){
        $pasien->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
