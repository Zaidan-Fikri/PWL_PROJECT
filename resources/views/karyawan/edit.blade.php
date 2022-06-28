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
            <form method="post" action="{{ route('karyawan.update', $karyawan->id)}}" id="myForm" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="form-group">
                    <label for="foto">Foto Profil</label>
                    <img src="{{ asset('storage/'.$karyawan -> foto) }}" class="w-100 border-radius-lg shadow-sm">
                    <input type="file" name="foto" class="form-control" id="foto" value="{{ $karyawan->foto }}" aria-describedby="foto">
                </div>
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $karyawan->nama }}" aria-describedby="nama">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ $karyawan->email }}" aria-describedby="email">
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Handphone</label>
                    <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ $karyawan->no_hp }}" aria-describedby="no_hp">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ $karyawan->jabatan }}" aria-describedby="jabatan">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection