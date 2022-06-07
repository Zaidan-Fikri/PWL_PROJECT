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
            <form method="post" action="{{ route('barang.store') }}" id="myForm" enctype="multipart/formdata">
            @csrf
                <div class="form-group">
                    <label for="Seri">Seri</label>
                    <input type="text" name="seri" class="form-control" id="Seri" ariadescribedby="Seri" >
                </div>
                <div class="form-group">
                    <label for="foto">Foto Profil</label>
                    <input type="file" name="foto" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="nama_barang" name="nama_barang" class="form-control" id="nama_barang" ariadescribedby="nama_barang" >
                </div>
                <div class="form-group">
                    <label for="Stok">Stok</label>
                    <input type="Stok" name="stok" class="form-control" id="Stok" ariadescribedby="Stok" >
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" id="harga" ariadescribedby="harga" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection