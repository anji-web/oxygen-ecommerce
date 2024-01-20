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
        Schema::create('data_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->date('created_at');
            $table->date('updated_at');
            $table->integer('id_barang')->length(11);
            $table->string('nama_barang', 254);
            $table->integer('stok')->length(11);
            $table->integer('id_supplier')->length(11);
            $table->string('nama_supplier', 254);
            $table->string('harga_beli', 254);
            $table->date('tanggal_masuk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_barang_masuk');
    }
};
