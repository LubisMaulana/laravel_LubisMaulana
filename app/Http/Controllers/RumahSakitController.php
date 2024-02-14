<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index(){
        $listRS = RumahSakit::orderBy('nama', 'asc')->get();
        return view('rs.view',[
            'title'=>'CRUD Rumah Sakit | View',
            'page' => 'Administrasi Rumah Sakit',
            'titleHeader' => 'Data Rumah Sakit',
            'aksi' => 'Tambah Data',
            'listRS' => RumahSakit::orderByDesc('updated_at')->get(),
            'count' => 1,
            'listRS' => $listRS
        ]);
    }

    public function pageAdd(){
        return view('rs.add',[
            'title'=>'CRUD Rumah Sakit | Add',
            'page' => 'Add Rumah Sakit',
            'titleHeader' => 'Tambah Data Rumah Sakit',
            'aksi' => 'Kembali',
        ]);
    }

    public function pageEdit(RumahSakit $rs){
        return view('rs.edit',[
            'title'=>'CRUD Rumah Sakit | Edit',
            'page' => 'Edit Rumah Sakit',
            'titleHeader' => 'Edit Data Rumah Sakit',
            'aksi' => 'Kembali',
            'rs' => $rs
        ]);
    }

    public function add(Request $request){
        $credentials = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telp' => 'required'
        ]);

        RumahSakit::create($credentials);
        return redirect()->intended('rumah-sakit')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(RumahSakit $rs, Request $request){
        $credentials = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telp' => 'required'
        ]);

        $rs->update($credentials);
        return back()->with('success', 'Data berhasil di update.');
    }

    public function destroy(RumahSakit $rs){
        $rs->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
