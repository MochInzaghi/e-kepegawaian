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
    public function index(Request $request)
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

        if ($request->has('cari')) {
            $datapegawai = DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
            foreach ($datapegawai as $dp) {
                $dp->kp = Carbon::createFromFormat('Y-m-d', $dp->kp)->addYear(4)->format('Y-m-d');
            }
        } else {
            $datapegawai = DataPegawai::with('pegawaiKp')->get();
            foreach ($datapegawai as $dp) {
                $dp->kp = Carbon::createFromFormat('Y-m-d', $dp->kp)->addYear(4)->format('Y-m-d');
            }
        }

       

        $datakp = DataKp::all();

        return view('tabel.tabeldatakp2021-2025', compact('dates', 'datapegawai', 'datakp'));
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
        $datakp = DataKp::find($id);
        if (!$datakp) {
            abort(404);
        }

        return view('form.formeditkp',  compact('datakp'));
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

            $request->validate([
                    'skp_struktural' => 'required|image|mimes:jpeg,png,jpg',
                    'sp_tugas' => 'required|image|mimes:jpeg,png,jpg',
                    'sp_pelantikan' => 'required|image|mimes:jpeg,png,jpg',
                    'ba_pengangkatansumpah' => 'required|image|mimes:jpeg,png,jpg',
                    'ijazah_terakhir' => 'required|image|mimes:jpeg,png,jpg',
                    'surat_tandalulus' => 'required|image|mimes:jpeg,png,jpg',
                    'skp_2020' => 'required|image|mimes:jpeg,png,jpg',
                    'skp_2021' => 'required|image|mimes:jpeg,png,jpg',
                    'skp_jabatan' => 'required|image|mimes:jpeg,png,jpg',
                    'sp_pengangkatanlama' => 'required|image|mimes:jpeg,png,jpg',
            ]);
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

            $skp_struktural = request()->file('skp_struktural') ? request()->file('skp_struktural')->storeAs("files/skp_struktural", $request->skp_struktural) : null;
    
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

    public function print(Request $request, $id){
        $datapegawai = DataPegawai::with('pegawaiKp')->find($id);
        $datakp = $datapegawai->pegawaiKp;
        if ($datakp->isEmpty()) {
            return response()->json([
                'message' => 'Data KP tidak ditemukan'
            ]);
        }
        return view('laporan.datakp', compact('datapegawai'));
    }

    public function showModalKp(Request $request, $id)
    {
        $datapegawai = DataPegawai::with('pegawaiKp')->find($id);
        $datakp = $datapegawai->pegawaiKp;
        if ($datakp->isEmpty()) {
            return response()->json([
                'message' => 'Data KP tidak ditemukan'
            ]);
        }
        return view('modal.modal-view-kp', compact('datapegawai'));
    }
}
