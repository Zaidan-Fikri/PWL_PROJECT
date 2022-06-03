@extends('layouts.master')

@section('content')
<div class="container-fluid py-4">
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="text-center card-header pb-0">
          <h6>Karyawan</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jabatan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($karyawan as $kar)
                <tr>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $kar -> id }}</p>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="{{ $kar -> foto }}" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $kar -> nama }}</h6>
                        <p class="text-xs text-secondary mb-0">{{ $kar -> email }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $kar -> no_hp }}</p>
                    {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $kar -> jabatan}}</p>
                    {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                  </td>
                  <td class="align-middle text-center">
                    <form action="" method="POST">
                      <a class="btn btn-info" href="{{ route('karyawan.show', $kar->id) }}">Show</a>
                      <a class="btn btn-primary" href="">Edit</a>
                      <a class="btn btn-warning" href="">Delete</a>
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