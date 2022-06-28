<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('barang.barang', ['judul' => 'Data Barang', 'nama' => 'Data Barang', 'barang' => $barang]);
    }

    public function create(){
        return view('barang.create', ['judul' => 'Tambah Barang', 'nama' => 'Tambah Barang']);
    }

    public function store(Request $request){
        // return dd($request);
        if($request->file('foto')){
            $image_name = $request->file('foto')->store('images', 'public');
        } else {
            $image_name = 'zaidan';
        }

        Barang::create([
            'seri' => $request->seri,
            'foto' => $image_name,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('barang.index')
        ->with('success', 'Barang Berhasil Ditambahkan');
    }

    public function show($seri){
        $barang = Barang::find($seri);
        return view('barang.detail', ['judul' => 'Detail Barang', 'nama' => 'Detail Barang', 'barang' => $barang]);
    }

    public function destroy($seri){
        Barang::where('seri', $seri)->delete();
        return redirect()->route('barang.index')
        -> with('success', 'Barang Berhasil Dihapus');
    }
}
