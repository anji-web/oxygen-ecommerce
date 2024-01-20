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
        Schema::create('data_bagian_penjualan', function (Blueprint $table) {
            $table->id();
            $table->date('created_at');
            $table->date('updated_at');
            $table->date('tanggal_lahir');
            $table->string('user', 254);
            $table->string('tempat_lahir', 100);
            $table->string('kategori', 254);
            $table->string('alamat', 254);
            $table->string('no_telp', 254);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_bagian_penjualan');
    }
};
