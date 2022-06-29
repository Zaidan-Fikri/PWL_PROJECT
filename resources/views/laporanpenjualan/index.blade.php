@extends('layouts.master')

@section('content')
{{-- @if ($message = Session::get('success'))
  <div class="alert alert-success container-fluid py-4">
    <p>{{ $message}}</p>
  </div>
@endif --}}
<div class="container-fluid py-4">
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="text-left card-header pb-0">
          <a class="btn btn-warning" href="{{ url('/cetak_pdf/laporanpenjualan')}} " style="float:right; margin-right:1cm">Cetak PDF</a>
          <a class="btn btn-success" href="{{ route('laporan_penjualan.create') }} " style="float:right; margin-right:1cm">+</a>
          <h6>Barang</h6>
        </div>
        @if ($message = Session::get('success'))
          <div class="alert alert-success container-fluid py-4">
            <p>{{ $message}}</p>
          </div>
        @endif
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">harga</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($laporan_penjualan as $lap)
                <tr>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $lap -> id }}</p>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="{{ asset('storage/'.$lap -> foto) }}" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $lap -> nama_barang }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $lap -> harga }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $lap -> jumlah }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <form action="{{ route('laporan_penjualan.destroy', ['laporan_penjualan'=>$lap->id])}}" method="POST">
                      <a class="btn btn-info" href="{{ route('laporan_penjualan.show', $lap->id) }}">Detail</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection