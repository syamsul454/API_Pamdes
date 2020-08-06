<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDebitAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_debit_airs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pelanggan_id')->nullable();
            $table->foreign('pelanggan_id')
            ->on('pelanggans')
            ->references('id');
            $table->unsignedInteger('pegawai_id')->nullable();
            $table->foreign('pegawai_id')
            ->on('data_pegawais')
            ->references('id');
            $table->integer('meter_awal');
            $table->integer('meter_akhir');
            $table->integer('pemakain');
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
        Schema::dropIfExists('data_debit_airs');
    }
}
