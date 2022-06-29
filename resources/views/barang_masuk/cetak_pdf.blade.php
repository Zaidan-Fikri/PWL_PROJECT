<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Barang Masuk</title>
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>Laporan Barang Masuk</h5>
        </center>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Barang</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang_masuk as $bar)
                <tr>
                    <td>{{ $bar->id }}</td>
                    <td><img width="100px" src="{{storage_path('app/public/'.$a->featured_image) }}"></td>
                    <td>{{ $bar->nama_barang }}</td>
                    <td>{{ $bar->supplier }}</td>
                    <td>{{ $bar->jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>