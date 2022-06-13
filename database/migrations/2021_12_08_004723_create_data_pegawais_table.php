<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('namapegawai');
            $table->string('nip');
            $table->string('ttl');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('jenjang');
            $table->string('notelp');
            $table->date('kgb');
            $table->date('kp');
            $table->string('gajipokok');
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
        Schema::dropIfExists('data_pegawais');
    }
}
