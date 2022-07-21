<?php

namespace App\Http\Controllers;

use App\Models\DataKp;
use App\Models\DataPegawai;
use App\Models\FilePegawai;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use Illuminate\Facades\Storage;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

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
        $data_pegawai = DataPegawai::with('pegawaiKp')->find($id);
        $datakp = $data_pegawai->pegawaiKp;
        // return $datapegawai;
        return view('form.formeditkp', compact('data_pegawai'));
    }

    public function storeFile($fileStore, $user_id, $requestCol)
    {
        $file = $fileStore;
        $extension = $file->getClientOriginalExtension();
        $filename = $requestCol . '.' . $extension;
        $file->storeAs("public/" . $user_id, $filename);
        DataKp::create([
            'data_pegawai_id' => $user_id,
            $requestCol => $filename,
        ]);
        return $filename;
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
        // dd($request);
        try {
            $this->validate($request, [
                'skp_struktural' => 'file|mimes:pdf|max:2048',
                'sp_tugas' =>  'file|mimes:pdf|max:2048',
                'sp_pelantikan' =>  'file|mimes:pdf|max:2048',
                'ba_pengangkatansumpah' =>  'file|mimes:pdf|max:2048',
                'ijazah_terakhir' =>  'file|mimes:pdf|max:2048',
                'surat_tandalulus' =>  'file|mimes:pdf|max:2048',
                'skp_2020' =>  'file|mimes:pdf|max:2048',
                'skp_2021' =>  'file|mimes:pdf|max:2048',
                'skp_jabatan' =>  'file|mimes:pdf|max:2048',
                'sp_pengangkatanlama' =>  'file|mimes:pdf|max:2048',
            ]);

            foreach ($request->file() as $key => $value) {
                // if ($request->hasFile($key)) {
                $this->storeFile($request->file($key), $request->data_pegawai_id, $key);
                // }
            }

            return redirect('/admin/datakp')->with('success', 'Data KP Berhasil di Update');
        } catch (ValidationException $e) {
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

    public function print(Request $request, $id)
    {
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

    public function status()
    {
        $data = DataKp::all();
        foreach ($data as $d) {
            if (empty($d)) {
                $status = 'Belum Lengkap';
            } else {
                $status = 'Sudah Lengkap';
            }
            return view('tabel.tabeldatakp2021-2025', compact('status'));
        }
    }
}
