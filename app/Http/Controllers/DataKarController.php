<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;

class DataKarController extends Controller
{
    public function datakar(){
        $karyawan = Karyawan::all();
        return view('datakar', ['judul' => 'Data Karyawan', 'nama' => 'Data Karyawan', 'karyawan' => $karyawan]);
    }
}
