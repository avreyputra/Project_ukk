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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->unsignedBigInteger('kategori_produk_id');
            $table->foreign('kategori_produk_id')->references('id_kategori_produk')->on('kategori_produk');
            $table->string('nama_produk');
            $table->string('ukuran_sandal');
            $table->string('slug_produk');
            $table->integer('stok_produk');
            $table->integer('harga_produk');
            $table->longText('foto_produk');
            $table->longText('deskripsi_produk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
