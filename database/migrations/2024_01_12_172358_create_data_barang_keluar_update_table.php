<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('id_barang')->length(11);
            $table->string('nama_barang', 254);
            $table->integer('stok')->length(11);
            $table->integer('id_bagian_penjualan')->length(11);
            $table->string('nama_bagian_penjualan', 254);
            $table->string('harga_jual', 254);
            $table->string('sku', 100);
            $table->timestamp('tanggal_keluar');
            $table->timestamp('tanggal_masuk_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_barang_keluar');
    }
};
