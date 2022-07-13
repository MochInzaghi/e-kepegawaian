<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('data_pegawai_id')->unsigned();
            $table->string('skp_struktural')->nullable();
            $table->string('sp_tugas')->nullable();
            $table->string('sp_pelantikan')->nullable();
            $table->string('ba_pengangkatansumpah')->nullable();
            $table->string('ijazah_terakhir')->nullable();
            $table->string('surat_tandalulus')->nullable();
            $table->string('skp_2020')->nullable();
            $table->string('skp_2021')->nullable();
            $table->string('skp_jabatan')->nullable();
            $table->string('sp_pengangkatanlama')->nullable();
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
        Schema::dropIfExists('data_kps');
    }
}
