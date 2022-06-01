<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataKarController extends Controller
{
    public function datakar(){
        return view('datakar', ['judul' => 'Data Karyawan']);
    }
}
