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
            $table->string('skp_struktural');
            $table->string('sp_tugas');
            $table->string('sp_pelantikan');
            $table->string('ba_pengangkatansumpah');
            $table->string('ijazah_terakhir');
            $table->string('surat_tandalulus');
            $table->string('skp_2020');
            $table->string('skp_2021');
            $table->string('skp_jabatan');
            $table->string('sp_pengangkatanlama');
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
