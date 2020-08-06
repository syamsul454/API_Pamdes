<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_debit_air')->nullable();
            $table->foreign('id_debit_air')
            ->on('data_debit_airs')
            ->references('id');
            $table->integer('harga_M3');
            $table->integer('beban');
            $table->integer('jumlah_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('data_pembayarans');
    }
}
