<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataKgb;
use App\Models\DataKp;
use App\Models\DataDuk;
use App\Models\DataPenghargaan;
use App\Models\DataPensiun;

class DataPegawai extends Model
{
    protected $table = 'data_pegawais'; //sesuaikan nama table
    protected $guarded = [''];

    use HasFactory;

    public function pegawaiKgb()
    {
        return $this->hasMany(DataKgb::class);
    }

    public function pegawaiKp()
    {
        return $this->hasMany(DataKp::class);
    }

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
