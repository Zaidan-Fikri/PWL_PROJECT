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
            <form method="post" action="{{ route('supplier.store') }}" id="myForm" enctype="multipart/formdata">
            @csrf
                <div class="form-group">
                    <label for="foto">Foto Profil</label>
                    <input type="file" name="foto" class="form-control" required="required">
                </div>
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <input type="Nama" name="nama" class="form-control" id="Nama" ariadescribedby="Nama" >
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="Email" name="email" class="form-control" id="Email" ariadescribedby="Email" >
                </div>
                <div class="form-group">
                    <label for="No_HP">Nomor Handphone</label>
                    <input type="text" name="no_hp" class="form-control" id="No_HP" ariadescribedby="No_HP" >
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="Alamat" name="alamat" class="form-control" id="Alamat" ariadescribedby="Alamat" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection