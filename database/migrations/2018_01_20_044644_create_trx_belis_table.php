<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrxBelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx_belis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->integer('harga_beli');
            $table->string('total')->nullable();
            $table->integer('suplier_id')->unsigned();
            $table->timestamps();
            $table->foreign('suplier_id')->references('id')->on('supliers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trx_belis');
    }
}
