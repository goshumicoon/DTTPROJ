<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality_controls', function (Blueprint $table) {
            $table->id();
            $table->string('unit_qc');
            $table->string('witel');
            $table->string('nik_naker');
            $table->string('wo_project');
            $table->string('tangible_teknisi');
            $table->string('foto_selfi');
            $table->string('jenis_temuan');
            $table->string('segmentasi_temuan');
            $table->string('segmentasi_alpro');
            $table->string('observasi_temuan');
            $table->string('cerita_temuan');
            $table->string('rekomendasi_perbaikan');
            $table->string('eviden_temuan_negative');
            $table->string('temuan_positive');
            $table->string('eviden_temuan_positive');
            $table->string('tanggal_input');
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
        Schema::dropIfExists('quality_controls');
    }
}
