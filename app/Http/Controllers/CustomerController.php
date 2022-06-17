<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::all();
        return view('customer.customer', ['judul'=>'Data Customer', 'nama' =>'Data Customer', 'customer' => $customer]);
    }

    public function create(){
        return view('customer.create',['judul' => 'Tambah Customer', 'nama' => 'Tambah Customer']);
    }

    public function store(Request $request){
        $upload = "";
        if($request->file('gambar')){
            $upload = $request->file('gambar')->store('images', 'public');
        }

        Customer::create([
            'foto' => $upload,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('customer.index')->with('success','Customer Berhasil Ditambahkan');
    }

    public function show($id){
        $customer = Customer::find($id); 
        return view('customer.detail',['judul' => 'Profile','nama' => 'Profile', 'customer' => $customer]);
    }

    public function destroy($id){
        Customer::find($id)->delete();
        return redirect()->route('customer.index') -> with('success', 'Customer Berhasil Dihapus');
    }
}
