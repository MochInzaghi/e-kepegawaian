<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenghargaan extends Model
{
    protected $table = 'data_penghargaans'; //sesuaikan nama table
    protected $guarded = [''];

    public function getPegawai()
    {
        return $this->belongsTo(DataPegawai::class);
    }
}
