<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDtt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dtt', function (Blueprint $table) {
            $table->id('id_order');
            $table->string('nama_customer');
            $table->date('tanggal_order');
            $table->unsignedBigInteger('id_package');
            $table->string('status');
            $table->integer('jumlah');
            $table->string('kode_referal')->nullable();
            $table->string('nama_agent');
            $table->string('referal_chain')->nullable();
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
        Schema::dropIfExists('order_dtt');
    }
}
