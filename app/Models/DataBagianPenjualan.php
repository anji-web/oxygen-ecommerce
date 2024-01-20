<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBagianPenjualan extends Model
{
    use HasFactory;
    protected $table = 'data_bagian_penjualan';

    protected $fillable = [
        'user',
        'gender',
        'tempat_lahir',
        'alamat',
        'no_telp'
    ];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tanggal_lahir' => 'datetime',
    ];
}
