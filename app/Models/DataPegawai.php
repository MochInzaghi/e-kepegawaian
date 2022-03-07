<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    protected $table = 'data_pegawais' ;//sesuaikan nama table
    protected $fillable = ['namapegawai','nip','ttl','pangkat','jabatan','jenjang','notelp','kgb','kp','gajipokok','keterangan'];

    public function pegawaiDuk(){
        return $this->hasOne(DataDuk::class);    
    }

}
