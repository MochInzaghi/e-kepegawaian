<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCuti extends Model
{
    protected $table = 'data_cutis' ;//sesuaikan nama table
    protected $fillable = ['namapegawai','nip','jabatan','jeniscuti','daritgl','sampaitgl','jmlhrkrj','sisacuti','pejabat','nosurat','tanggal','keterangan'];
}
