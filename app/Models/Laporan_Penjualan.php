<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan_Penjualan extends Model
{
    protected $table = 'laporan_penjualan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'foto',
        'nama_barang',
        'harga',
        'jumlah'
    ];
}
