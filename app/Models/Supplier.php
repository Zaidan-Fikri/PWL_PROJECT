<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id';

    protected $fillable = [
        'foto',
        'nama',
        'email',
        'no_hp',
        'alamat',
    ];
}
