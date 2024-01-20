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
        Schema::create('data_supplier', function (Blueprint $table) {
            $table->id();
            $table->date('created_at');
            $table->date('updated_at');
            $table->integer('nama_supplier')->length(11);
            $table->string('alamat', 100);
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
        Schema::dropIfExists('data_supplier');
    }
};
