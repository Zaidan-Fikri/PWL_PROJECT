<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LaporanPenjualan;
use Illuminate\Support\Facades\Storage;
use PDF;    

class LaporanPenjualanController extends Controller
{
    public function index(){
        $laporanpenjualan = LaporanPenjualan::orderBy('id', 'asc')->paginate(2);
        return view('laporan_penjualan.index', ['judul' => 'Laporan Barang Masuk', 'nama' => 'Data Barang', 'laporan_penjualan' => $laporanpenjualan]);
    }

    public function create(){
        return view('laporan_penjualan.create', ['judul' => 'Tambah Barang Masuk', 'nama' => 'Tambah Barang']);
    }

    public function store(Request $request){
        // return dd($request->file());
        // $image_name = '';
        $upload = "";
        if($request->file('gambar')){
            $upload = $request->file('gambar')->store('images', 'public');
        }

        LaporanPenjualan::create([
            'foto' => $upload,
            'nama_barang' => $request->nama_barang,
            'supplier' => $request->supplier,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('laporan_penjualan.index')
        ->with('success', 'Karyawan Berhasil Ditambahkan');
    }

    public function show($id){
        $laporanpenjualan = LaporanPenjualan::find($id);
        return view('laporan_penjualan.detail', ['judul' => 'Detail', 'nama' => 'Detail', 'laporan_penjualan' => $laporanpenjualan]);
    }

    public function edit($id){
        $laporanpenjualan = KLaporanPenjualan::find($id);
        return view('laporan_penjualan.edit', ['judul' => 'Edit Barang', 'nama' => 'Edit Barang', 'laporan_penjualan' => $laporanpenjualan]);
    }

    public function update(Request $request, $id){
        $laporanpenjualan = laporanpenjualan::find($id);

        // if($LaporanPenjualan->foto && file_exists(storage_path('app/public/' . $LaporanPenjualan->foto))){
        //     \Storage::delete('public/' . $LaporanPenjualan->foto);
        // }
        $update = $request->file('foto')->store('images', 'public');
        $laporanpenjualan->foto = $update;

        $laporanpenjualan->foto = $request->foto;
        $laporanpenjualan->nama_barang = $request->nama_barang;
        $laporanpenjualan->supplier = $request->supplier;
        $laporanpenjualan->jumlah = $request->jumlah;
        
        $laporanpenjualan->save();
        return redirect()->route('laporan_penjualan.index')
        ->with('success', 'Barang Masuk Berhasil Dirubah');
    }

    public function destroy($id){
        LaporanPenjualan::find($id)->delete();
        return redirect()->route('laporan_penjualan.index')
        -> with('success', 'Barang Masuk Berhasil Dihapus');
    }

    public function cetak_pdf(){
        $laporanpenjualan = LaporanPenjualan::all();
        return dd($laporanpenjualan);
        $pdf = PDF::loadview('laporan_penjualan.cetak_pdf', ['laporan_penjualan' => $laporanpenjualan]);
        return $pdf->stream();
    }
}
