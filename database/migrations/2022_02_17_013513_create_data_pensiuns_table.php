<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPensiunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pensiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pangkat');
            $table->date('tl_sk_pertama');
            $table->date('tmt_58');
            $table->date('tmt_60');
            $table->date('tanggal');
            $table->integer('no_sk');
            $table->string('keterangan');
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
        Schema::dropIfExists('data_pensiuns');
    }
}
