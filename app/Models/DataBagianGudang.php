<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBagianGudang extends Model
{
    use HasFactory;

    protected $table = 'data_bagian_gudang';
    protected $dates = ['tanggal_lahir'];

    protected $fillable = [
        'user',
        'gender',
        'tempat_lahir',
        'alamat',
        'no_telp'
    ];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
