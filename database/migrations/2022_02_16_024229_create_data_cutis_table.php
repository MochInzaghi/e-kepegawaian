<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_cutis', function (Blueprint $table) {
            $table->id();
            $table->string('namapegawai');
            $table->string('nip');
            $table->string('jabatan');
            $table->string('jeniscuti');
            $table->date('daritgl');
            $table->date('sampaitgl');
            $table->string('jmlhrkrj');
            $table->string('sisacuti');
            $table->string('pejabat');
            $table->string('nosurat');
            $table->date('tanggal');
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
        Schema::dropIfExists('data_cutis');
    }
}
