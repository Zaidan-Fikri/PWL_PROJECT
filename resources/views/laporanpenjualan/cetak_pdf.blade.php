<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Penjualan</title>
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>Laporan Penjualan</h5>
        </center>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporan_penjualan as $lap)
                <tr>
                    <td>{{ $lap->id }}</td>
                    <td><img width="100px" src="{{storage_path('app/public/'.$lap->foto) }}"></td>
                    <td>{{ $lap->nama_barang }}</td>
                    <td>{{ $lap->harga }}</td>
                    <td>{{ $lap->jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>