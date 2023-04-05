<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsePatrolNegativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hse_patrol_negatives', function (Blueprint $table) {
            $table->id();
            $table->string('nik_pelapor');
            $table->string('jenis_temuan');
            $table->string('cerita_temuan');
            $table->string('observasi_temuan');
            $table->string('rekomendasi_perbaikan');
            $table->string('segmentasi_temuan');
            $table->string('evident');
            $table->string('last_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hse_patrol_negatives');
    }
}
