@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 65rem;">
            <div class="card-header">
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush" style="margin-top: 0cm">
                    <li class="list-group-item"><b>Seri: </b></li>
                    <li class="list-group-item">{{ $barang -> seri }}</li>
                    <li class="list-group-item"><b>Foto: </b></li>
                    <li class="list-group-item"><img src="{{ asset('storage/'.$barang -> foto) }}" class="w-30 border-radius-lg shadow-sm"></li>
                    <li class="list-group-item"><b>Nama: </b></li>
                    <li class="list-group-item">{{ $barang -> nama_barang }}</li>
                    <li class="list-group-item"><b>Stok: </b></li>
                    <li class="list-group-item">{{ $barang -> stok }}</li>
                    <li class="list-group-item"><b>Harga: </b></li>
                    <li class="list-group-item">{{ $barang -> harga }}</li>
                </ul>
            </div>
            <a class="btn btn-success" style="width: 5cm; margin-left: 21cm" href="{{ route('barang.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection