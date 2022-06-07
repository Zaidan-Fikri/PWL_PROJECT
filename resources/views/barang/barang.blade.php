@extends('layouts.master')

@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-success container-fluid py-4">
    <p>{{ $message}}</p>
  </div>
@endif
<div class="container-fluid py-4">
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="text-left card-header pb-0">
          <a class="btn btn-success" href="{{ route('barang.create') }}" style="float:right; margin-right:1cm">+</a>
          <h6>Barang</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Seri</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stok</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($barang as $bar)
                <tr>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $bar -> seri }}</p>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="{{ $bar -> foto }}" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $bar -> nama_barang }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $bar -> stok }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $bar -> harga }}</p>
                  </td>
                  <td class="align-middle text-center">
                    <form action="{{ route('barang.destroy', ['barang'=>$bar->seri])}}" method="POST">
                      <a class="btn btn-info" href="{{ route('barang.show', $bar->seri) }}">Profile</a>
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