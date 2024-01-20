<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'data_barang_keluar';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'stok',
        'id_bagian_penjualan',
        'nama_bagian_penjualan',
        'harga_jual',
        'sku',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tanggal_keluar' => 'datetime',
        'tanggal_masuk_barang' => 'datetime'

    ];
}
