<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDuk extends Model
{
    protected $table = 'data_duks'; //sesuaikan nama table
    protected $fillable = ['data_pegawai_id', 'tmt', 'jabatanterakhir', 'mk_tahun', 'mk_bulan', 'pendidikan_kepemimpinan', 'tahunlulus', 'pendidikan_terakhir', 'tahun_lulus', 'jeniskelamin', 'agama_tahun', 'tahunpensiun', 'keterangan_duk'];

    public function getPegawai()
    {
        return $this->belongsTo(DataPegawai::class);
    }
}
