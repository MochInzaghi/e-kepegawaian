<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKgbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kgbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('data_pegawai_id')->unsigned();
            $table->date('tgl_lahir');
            $table->string('oleh_pejabat');
            $table->date('tgl');
            $table->date('tgl_gaji');
            $table->string('masakerja_tgl');
            $table->string('gajibaru');
            $table->string('masakerja');
            $table->string('gol_ruang');
            $table->date('mulai_tgl');
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
        Schema::dropIfExists('data_kgbs');
    }
}
