<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;

class DataKarController extends Controller
{
    public function index(){
        $karyawan = Karyawan::all();
        return view('karyawan.datakar', ['judul' => 'Data Karyawan', 'nama' => 'Data Karyawan', 'karyawan' => $karyawan]);
    }

    public function show($id){
        $karyawan = Karyawan::find($id);
        return view('karyawan.detail', ['judul' => 'Profile', 'nama' => 'Profile', 'karyawan' => $karyawan]);
    }

    public function destroy($id){
        Karyawan::find($id)->delete();
        return redirect()->route('karyawan.datakar')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
