<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'data_barang_masuk';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'stok',
        'id_supplier',
        'nama_supplier',
        'harga_beli',
        'sku'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tanggal_masuk' => 'datetime'
    ];
}
