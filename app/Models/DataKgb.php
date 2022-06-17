<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPegawai;


class DataKgb extends Model
{
    protected $table = 'data_kgbs' ;//sesuaikan nama table
    protected $fillable = ['data_pegawai_id','tgl_lahir','tgl','tgl_gaji','masakerja_tgl','gajibaru','masakerja','gol_ruang','mulai_tgl'];

    public function getPegawai(){
        return $this->belongsTo(DataPegawai::class, 'data_pegawai_id');
    }
}
