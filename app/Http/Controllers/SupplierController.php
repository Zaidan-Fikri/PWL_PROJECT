<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function index(){
        $supplier = Supplier::all();
        return view('supplier.supplier', ['judul'=>'Data Supplier', 'nama' =>'Data Supplier', 'supplier' => $supplier]);
}

public function create(){
    return view('supplier.create',['judul' => 'Tambah Supplier', 'nama' => 'Tambah Supplier']);
}

public function store(Request $request){
    if ($request->file('foto')) {
        $image_name = $request->file('foto')->store('images','public');
    }

    Supplier::create([
        'foto' => $image_name,
        'nama' => $request->nama,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
    ]);

    return redirect()->route('supplier.index')->with('success','Supplier Berhasil Ditambahkan');
    }

    public function show($id){
        $customer = Supplier::find($id); 
        return view('supplier.detail',['judul' => 'Profile','nama' => 'Profile', 'supplier' => $supplier]);
    }

    public function destroy($id){
        Supplier::find($id)->delete();
        return redirect()->route('supplier.index') -> with('success', 'Supplier Berhasil Dihapus');
    }
}