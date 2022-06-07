<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai;

class DashboardController extends Controller
{
    public function index()
    {
        $datadinas = DataPegawai::where('keterangan', 'Dinas')->get();
        $datahonorer = DataPegawai::where('keterangan', 'Honorer')->get();

        return view('index', compact('datadinas', 'datahonorer'));
    }
}
