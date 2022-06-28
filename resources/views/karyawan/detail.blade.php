@extends('layouts.master')

@section('content')
<div class="card shadow-lg mx-4 card-profile-top">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ asset('storage/'.$karyawan -> foto) }}" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{ $karyawan -> nama }}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
              {{ $karyawan -> jabatan }}
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
              <li class="nav-item">
                <a href="" class="btn btn-primary btn-sm ms-auto" style="margin-left:5mm; margin-right:5mm; height:35px; text-align:center; float:right">Edit Profile</a>
              {{-- </li>
              <li class="nav-item">
              </li>
              <li class="nav-item"> --}}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Profile</p>
              <a href="{{ route('karyawan.index') }}" class="btn btn-success btn-sm ms-auto" style="margin-left:5mm; margin-right:5mm; height:35px; text-align:center">Back</a>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <div class="row">
              <input type="hidden" name="id" value="{{ $karyawan -> id}}">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Username</label>
                  <input class="form-control"  name="nama" type="text" value="{{ $karyawan -> nama }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email address</label>
                  <input class="form-control" name="email" type="email" value="{{ $karyawan -> email }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nomor Telepon</label>
                  <input class="form-control" name="no_hp" type="text" value="{{ $karyawan -> no_hp}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Jabatan</label>
                  <input class="form-control" name="jabatan" type="text" value="{{ $karyawan -> jabatan }}">
                </div>
              </div>
            </div>
@endsection