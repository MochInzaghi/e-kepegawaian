<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_duks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('data_pegawai_id');
            $table->string('tmt');
            $table->string('jabatanterakhir');
            $table->integer('mk_tahun');
            $table->integer('mk_bulan');
            $table->string('pendidikan_kepemimpinan');
            $table->integer('tahunlulus');
            $table->string('pendidikan_terakhir');
            $table->integer('tahun_lulus');
            $table->string('jeniskelamin');
            $table->string('agama_tahun');
            $table->integer('tahunpensiun');
            $table->string('keterangan_duk');
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
        Schema::dropIfExists('data_duks');
    }
}
