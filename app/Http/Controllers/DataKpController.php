<?php

namespace App\Http\Controllers;

use App\Models\DataKp;
use App\Models\DataPegawai;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;

class DataKpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $datapegawai1 = DataPegawai::first();
        // $test = Carbon::createFromFormat('Y-m-d', $datapegawai1->kgb);
        // dd($test->addYear(2));

        $start_date = date_create("2021-01-01");
        $end_date   = date_create("2025-12-31");
        $interval = new DateInterval('P1Y');
        $daterange = new DatePeriod($start_date, $interval, $end_date);

        $dates = [];
        foreach ($daterange as $date) {
            $dates[] = $date->format('Y');
        }

        $datapegawai = DataPegawai::get();
        foreach ($datapegawai as $dp) {
            $dp->kp = Carbon::createFromFormat('Y-m-d', $dp->kp)->addYear(4)->format('Y-m-d');
        }

        // dd($datapegawai);

        return view('tabel.tabeldatakp2021-2025', compact('dates', 'datapegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataKp  $dataKp
     * @return \Illuminate\Http\Response
     */
    public function show(DataKp $dataKp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataKp  $dataKp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pegawai = DataPegawai::find($id);
        if (!$data_pegawai) {
            abort(404);
        }

        return view('form.formeditkp', ['data_pegawai' => $data_pegawai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKp  $dataKp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataKp $dataKp)
    {
        try{
            DataKp::updateorCreate(
                ['data_pegawai_id' => $request->data_pegawai_id],
                [
                    'skp_struktural' => $request->skp_struktural,
                    'sp_tugas' => $request->sp_tugas,
                    'sp_pelantikan' => $request->sp_pelantikan,
                    'ba_pengangkatansumpah' => $request->ba_pengangkatansumpah,
                    'ijazah_terakhir' => $request->ijazah_terakhir,
                    'surat_tandalulus' => $request->surat_tandalulus,
                    'skp_2020' => $request->skp_2020,
                    'skp_2021' => $request->skp_2021,
                    'skp_jabatan' => $request->skp_jabatan,
                    'sp_pengangkatanlama' => $request->sp_pengangkatanlama,
                    
                ]
            );
    
            return redirect('/admin/datakp')->with('success', 'Data KP Berhasil di Update');
        }catch (Exception $e) {
            // dd($e);
            Alert::error('Gagal', 'Gagal Mengupdate Data KP');
            return back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKp  $dataKp
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKp $dataKp)
    {
        //
    }
}
