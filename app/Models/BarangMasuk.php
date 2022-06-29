<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id';

    protected $fillable = [
        'foto',
        'nama_barang',
        'supplier',
        'jumlah'
    ];
}
