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
        Schema::create('checkout', function (Blueprint $table) {
            $table->id('id_checkout');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('alamat_id');
            $table->foreign('alamat_id')->references('id_alamat')->on('alamat');
            $table->string('ekspedisi');
            $table->enum('status_transaksi', ['Pending', 'Tolak', 'Proses', 'Pengiriman', 'Selesai']);
            $table->date('tanggal_checkout');
            $table->string('kode_checkout');
            $table->string('kode_invoice');
            $table->text('catatan_pembeli');
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
        Schema::dropIfExists('checkout');
    }
};
