<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Laporan_Penjualan;
use Illuminate\Support\Facades\Storage;
use PDF;    

class LaporanPenjualanController extends Controller
{
    public function index(){
        $laporanpenjualan = Laporan_Penjualan::orderBy('id', 'asc')->paginate(2);
        return view('laporanpenjualan.index', ['judul' => 'Laporan Barang Masuk', 'nama' => 'Data Barang', 'laporan_penjualan' => $laporanpenjualan]);
    }

    public function create(){
        return view('laporanpenjualan.create', ['judul' => 'Tambah Barang Masuk', 'nama' => 'Tambah Barang']);
    }

    public function store(Request $request){
        // return dd($request->file());
        // $image_name = '';
        $upload = "";
        if($request->file('gambar')){
            $upload = $request->file('gambar')->store('images', 'public');
        }

        Laporan_Penjualan::create([
            'foto' => $upload,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('laporan_penjualan.index')
        ->with('success', 'Karyawan Berhasil Ditambahkan');
    }

    public function show($id){
        $laporanpenjualan = Laporan_Penjualan::find($id);
        return view('laporanpenjualan.detail', ['judul' => 'Detail', 'nama' => 'Detail', 'laporan_penjualan' => $laporanpenjualan]);
    }

    public function edit($id){
        $laporanpenjualan = KLaporan_Penjualan::find($id);
        return view('laporan_penjualan.edit', ['judul' => 'Edit Barang', 'nama' => 'Edit Barang', 'laporan_penjualan' => $laporanpenjualan]);
    }

    public function update(Request $request, $id){
        $laporanpenjualan = Laporan_Penjualan::find($id);

        // if($laporanpenjualan->foto && file_exists(storage_path('app/public/' . $laporanpenjualan->foto))){
        //     \Storage::delete('public/' . $laporanpenjualan->foto);
        // }
        $update = $request->file('foto')->store('images', 'public');
        $laporanpenjualan->foto = $update;

        $laporanpenjualan->foto = $request->foto;
        $laporanpenjualan->nama_barang = $request->nama_barang;
        $laporanpenjualan->harga = $request->harga;
        $laporanpenjualan->jumlah = $request->jumlah;
        
        $laporanpenjualan->save();
        return redirect()->route('laporan_penjualan.index')
        ->with('success', 'Barang Masuk Berhasil Dirubah');
    }

    public function destroy($id){
        Laporan_Penjualan::find($id)->delete();
        return redirect()->route('laporan_penjualan.index')
        -> with('success', 'Barang Masuk Berhasil Dihapus');
    }

    public function cetak_pdf(){
        $laporan_penjualan = Laporan_Penjualan::all();
        $pdf = PDF::loadview('laporanpenjualan.cetak_pdf', compact('laporan_penjualan'));
        // $pdf->setPaper('F4', 'landscape');
        return $pdf->stream();
    }
}
