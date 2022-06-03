<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    // use HasFactory;
    protected $fillable = [
        'Foto',
        'Nama',
        'Email',
        'No HP',
        'Jabatan',
    ];
}
