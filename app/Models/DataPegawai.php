<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    protected $table = 'data_pegawais'; //sesuaikan nama table
    protected $guarded = [''];

    use HasFactory;

    public function pegawaiDuk()
    {
        return $this->hasOne(DataDuk::class);
    }

    public function pegawaiPenghargaan()
    {
        return $this->hasOne(DataPenghargaan::class);
    }

    public function pegawaiPensiun()
    {
        return $this->hasOne(DataPensiun::class);
    }
}
