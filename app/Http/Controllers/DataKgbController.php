<?php

namespace App\Http\Controllers;

use App\Models\DataKgb;
use App\Models\DataPegawai;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use Exception;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class DataKgbController extends Controller
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

        // if ($request->has('cari')) {
        //     $data_kgb = \App\Models\DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        // } else {
        //     $data_kgb = \App\Models\DataPegawai::all();
        // }

        $start_date = date_create("2021-01-01");
        $end_date   = date_create("2025-12-31");
        $interval = new DateInterval('P1Y');
        $daterange = new DatePeriod($start_date, $interval, $end_date);


        $dates = [];
        foreach ($daterange as $date) {
            $dates[] = $date->format('Y');
        }

        $datapegawai = DataPegawai::with('pegawaiKgb')->get();
        // foreach ($datapegawai as $dp) {
        //     $dp->kgb = Carbon::createFromFormat('d-m-Y', $dp->kgb)->addYear(2);
        // }
        // dd($datapegawai->pegawaiKgb[0]->olehpejabat);

        $datakgb = DataKgb::all();
        // return 'oke';

        return view('tabel.tabeldatakgb2021-2025', compact('dates', 'datapegawai', 'datakgb'));
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
     * @param  \App\Models\DataKgb  $dataKgb
     * @return \Illuminate\Http\Response
     */
    public function show(DataKgb $dataKgb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataKgb  $dataKgb
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $datakgb = DataKgb::find($id);
        // if (!$datakgb) {
        //     return view('form.formeditkgb', compact('datakgb'));
        // }
        // return view('form.formeditkgb', compact('datakgb'));
        $datapegawai = DataPegawai::with('pegawaiKgb')->find($id);
        $datakgb = $datapegawai->pegawaiKgb;
        // return $datapegawai;
        return view('form.formeditkgb', compact('datapegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKgb  $dataKgb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataKgb $dataKgb)
    {
        try {
            $request->validate([
                'tgl_lahir' => 'required',
                'tgl' => 'required',
                'olehpejabat' => 'required',
                'tgl_gaji' => 'required',
                'masakerja_tgl' => 'required',
                'gajibaru' => 'required',
                'masakerja' => 'required',
                'gol_ruang' => 'required',
                'mulai_tgl' => 'required',
            ]);
            DataKgb::updateorCreate(
                ['data_pegawai_id' => $request->data_pegawai_id],
                [
                    'tgl_lahir' => $request->tgl_lahir,
                    'tgl' => $request->tgl,
                    'olehpejabat' => $request->olehpejabat,
                    'tgl_gaji' => $request->tgl_gaji,
                    'masakerja_tgl' => $request->masakerja_tgl,
                    'gajibaru' => $request->gajibaru,
                    'masakerja' => $request->masakerja,
                    'gol_ruang' => $request->gol_ruang,
                    'mulai_tgl' => $request->mulai_tgl,
                ]
            );

            return redirect('/admin/datakgb')->with('success', 'Data KGB Berhasil di Update');
        } catch (Exception $e) {
            // dd($e);
            Alert::error('Gagal', 'Gagal Mengupdate Data KGB');
            return back();
        }
    }

    public function View($id)
    {
        $data_kgb = DataKgb::find($id);
        return view('tabel.tabeldatakgb2021-2025', ['data_kgb' => $data_kgb]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKgb  $dataKgb
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKgb $dataKgb)
    {
        //
    }

    public function print(Request $request, $id)
    {
        $datapegawai = DataPegawai::with('pegawaiKgb')->find($id);
        $datakgb = $datapegawai->pegawaiKgb;
        if ($datakgb->isEmpty()) {
            return response()->json([
                'message' => 'Data KGB tidak ditemukan'
            ]);
        }
        return view('laporan.datakgb', compact('datapegawai'));
    }

    public function showModalKgb(Request $request, $id)
    {
        // $datakgb = DataKgb::where('data_pegawai_id', $id)->with('getPegawai')->first();
        $datapegawai = DataPegawai::with('pegawaiKgb')->find($id);
        $datakgb = $datapegawai->pegawaiKgb;
        if ($datakgb->isEmpty()) {
            return response()->json([
                'message' => 'Data KGB tidak ditemukan'
            ]);
        }
        return view('modal.modal-view-kgb', compact('datapegawai'));
    }
}
