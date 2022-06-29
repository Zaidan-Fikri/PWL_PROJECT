<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\Storage;
use PDF;    

class BarangMasukController extends Controller
{
    public function index(){
        $barangmasuk = BarangMasuk::orderBy('id', 'asc')->paginate(2);
        return view('barang_masuk.index', ['judul' => 'Laporan Barang Masuk', 'nama' => 'Data Barang', 'barang_masuk' => $barangmasuk]);
    }

    public function create(){
        return view('barang_masuk.create', ['judul' => 'Tambah Barang Masuk', 'nama' => 'Tambah Barang']);
    }

    public function store(Request $request){
        // return dd($request->file());
        // $image_name = '';
        $upload = "";
        if($request->file('gambar')){
            $upload = $request->file('gambar')->store('images', 'public');
        }

        BarangMasuk::create([
            'foto' => $upload,
            'nama_barang' => $request->nama_barang,
            'supplier' => $request->supplier,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('barang_masuk.index')
        ->with('success', 'Karyawan Berhasil Ditambahkan');
    }

    public function show($id){
        $barangmasuk = BarangMasuk::find($id);
        return view('barang_masuk.detail', ['judul' => 'Detail', 'nama' => 'Detail', 'barang_masuk' => $barangmasuk]);
    }

    public function edit($id){
        $barangmasuk = KBarangMasuk::find($id);
        return view('barang_masuk.edit', ['judul' => 'Edit Barang', 'nama' => 'Edit Barang', 'barang_masuk' => $barangmasuk]);
    }

    public function update(Request $request, $id){
        $barangmasuk = BarangMasuk::find($id);

        // if($barangmasuk->foto && file_exists(storage_path('app/public/' . $barangmasuk->foto))){
        //     \Storage::delete('public/' . $barangmasuk->foto);
        // }
        $update = $request->file('foto')->store('images', 'public');
        $barangmasuk->foto = $update;

        $barangmasuk->foto = $request->foto;
        $barangmasuk->nama_barang = $request->nama_barang;
        $barangmasuk->supplier = $request->supplier;
        $barangmasuk->jumlah = $request->jumlah;
        
        $barangmasuk->save();
        return redirect()->route('barang_masuk.index')
        ->with('success', 'Barang Masuk Berhasil Dirubah');
    }

    public function destroy($id){
        BarangMasuk::find($id)->delete();
        return redirect()->route('barang_masuk.index')
        -> with('success', 'Barang Masuk Berhasil Dihapus');
    }

    public function cetak_pdf(){
        $barang_masuk = BarangMasuk::all();
        $pdf = PDF::loadview('barang_masuk.cetak_pdf', compact('barang_masuk'));
        // $pdf->setPaper('F4', 'landscape');
        return $pdf->stream();
    }
}
