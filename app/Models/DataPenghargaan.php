<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenghargaan extends Model
{
    protected $table = 'data_penghargaans'; //sesuaikan nama table
    protected $fillable = ['data_pegawai_id', 'thn_10', 'thn_20', 'thn_30'];

    public function PegawaiPenghargaan()
    {
        return $this->belongsTo(DataPegawai::class);
    }
}
