@extends('layouts.master')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 65rem;">
            <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('laporan_penjualan.store') }}" id="myForm" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="foto">Foto Barang</label>
                    <input type="file" name="gambar" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="nama_barang" name="nama_barang" class="form-control" id="nama_barang" ariadescribedby="nama_barang" >
                </div>
                <div class="form-group">
                    <label for="Harga">Harga</label>
                    <input type="Harga" name="harga" class="form-control" id="Harga" ariadescribedby="Harga" >
                </div>
                <div class="form-group">
                    <label for="Jumlah">Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" id="Jumlah" ariadescribedby="Jumlah" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection