<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPensiun extends Model
{
    protected $table = 'data_pensiuns' ;//sesuaikan nama table
    protected $fillable = ['tl_sk_pertama','tmt_58','tmt_60','tanggal','no_sk','keterangan_pensiun'];

    public function getPegawai(){
        return $this->belongsTo(DataPegawai::class);
    }
}
