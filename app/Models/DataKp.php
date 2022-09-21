<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataPegawai;

class DataKp extends Model
{
    protected $table = 'data_kps' ;//sesuaikan nama table
    protected $guarded=[''];//sesuaikan nama kolom yang ada di table

    public function getPegawai(){
        return $this->belongsTo(DataPegawai::class, 'data_pegawai_id');
    }
}
