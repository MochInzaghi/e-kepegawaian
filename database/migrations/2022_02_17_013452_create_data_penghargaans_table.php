<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenghargaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penghargaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('data_pegawai_id')->unsigned();
            $table->date('thn_10');
            $table->date('thn_20');
            $table->date('thn_30');
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
        Schema::dropIfExists('data_penghargaans');
    }
}
