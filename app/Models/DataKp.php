<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPegawai;

class DataKp extends Model
{
    protected $table = 'data_kps' ;//sesuaikan nama table
    protected $fillable = ['data_pegawai_id','skp_struktural','sp_tugas','sp_pelantikan','ba_pengangkatansumpah','ijazah_terakhir','surat_tandalulus','skp_2020','skp_2021','skp_jabatan','sp_pengangkatanlama'];//sesuaikan nama kolom yang ada di table

    public function getPegawai(){
        return $this->belongsTo(DataPegawai::class, 'data_pegawai_id');
    }
}
