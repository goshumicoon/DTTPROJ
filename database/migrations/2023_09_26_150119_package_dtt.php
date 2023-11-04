<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PackageDtt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_dtt', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_package');
            $table->text('deskripsi')->nullable();
            $table->integer('harga')->nullable();
            $table->string('destinasi')->nullable();
            $table->integer('durasi')->nullable();
            $table->string('program')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->integer('kuota_tersedia')->nullable();
            $table->string('path_gambar_package')->nullable();
            $table->text('program_hari')->nullable();
            $table->text('list_hotel')->nullable();
            $table->string('maskapai')->nullable();
            $table->string('path_gambar_pamflet')->nullable();
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
        Schema::dropIfExists('package_dtt');
    }
}
