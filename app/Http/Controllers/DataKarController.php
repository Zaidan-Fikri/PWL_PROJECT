<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Storage;

class DataKarController extends Controller
{
    public function index(){
        $karyawan = Karyawan::all();
        return view('karyawan.datakar', ['judul' => 'Data Karyawan', 'nama' => 'Data Karyawan', 'karyawan' => $karyawan]);
    }

    public function create(){
        return view('karyawan.create', ['judul' => 'Tambah Karyawan', 'nama' => 'Tambah Karyawan']);
    }

    public function store(Request $request){
        // return dd($request->file());
        // $image_name = '';
        $upload = "";
        if($request->file('gambar')){
            $upload = $request->file('gambar')->store('images', 'public');
        }

        Karyawan::create([
            'foto' => $upload,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan
        ]);

        return redirect()->route('karyawan.index')
        ->with('success', 'Karyawan Berhasil Ditambahkan');
    }

    public function show($id){
        $karyawan = Karyawan::find($id);
        return view('karyawan.detail', ['judul' => 'Profile', 'nama' => 'Profile', 'karyawan' => $karyawan]);
    }

    public function destroy($id){
        Karyawan::find($id)->delete();
        return redirect()->route('karyawan.index')
        -> with('success', 'Karyawan Berhasil Dihapus');
    }
}
