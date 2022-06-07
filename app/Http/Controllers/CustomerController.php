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
        if ($request->file('foto')) {
            $image_name = $request->file('foto')->store('images','public');
        }

        Customer::create([
            'foto' => $image_name,
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
