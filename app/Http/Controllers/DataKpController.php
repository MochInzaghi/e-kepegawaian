<?php

namespace App\Http\Controllers;

use App\Models\DataKp;
use App\Models\DataPegawai;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use Illuminate\Facades\Storage;

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

            DataKp::updateorCreate(
                ['data_pegawai_id' => $request->data_pegawai_id],
                [
                    'skp_struktural' => $request->skp_struktural,
                    'sp_tugas' =>  $request->sp_tugas,
                    'sp_pelantikan' =>  $request->sp_pelantikan,
                    'ba_pengangkatansumpah' =>  $request->ba_pengangkatansumpah,
                    'ijazah_terakhir' =>  $request->ijazah_terakhir,
                    'surat_tandalulus' =>  $request->surat_tandalulus,
                    'skp_2020' =>  $request->skp_2020,
                    'skp_2021' =>  $request->skp_2021,
                    'skp_jabatan' =>  $request->skp_jabatan,
                    'sp_pengangkatanlama' =>  $request->sp_pengangkatanlama,
                ]
            );

            // if($request->hasFile('file')){
            //     $files = $request->file('file');
            //     foreach($files as $file){
            //         $name = $file->getClientOriginalName();
            //         $extension = $file->getClientOriginalExtension();
            //         $filename = $name . '.' . $extension;
            //         Storage::putFileAs('public', $request->file('file'), $filename);

            //         $data = [
            //             'path' => 'storage/files' . $filename,
            //         ];

            //         upload::updateorCreate($data);
            //     }
            //     return redirect('/admin/datakp')->with('success', 'Data KP Berhasil di Update');
            // }
            // $files[] = ['skp_struktural','sp_tugas','sp_pelantikan','ba_pengangkatansumpah','ijazah_terakhir','surat_tandalulus','skp_2020','skp_2021','skp_jabatan','sp_pengangkatanlama'];
            // $store = request()->file('skp_struktural') ? request()->file('skp_struktural')->storeAs("files", $request->skp_struktural) : null;
           
            if ($request->hasFile('skp_struktural')) {
                $file = $request->file('skp_struktural');
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $destination_path = public_path() . '/files';
                $filename = $name . '.' . $extension;
                $request->file('skp_struktural')->move($destination_path, $filename);
                $input['skp_struktural'] = $filename;
            }
                Storage::create($input);
                
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
    
    public function status(){
        $data = DataKp::all();
        foreach ($data as $d){
            if(empty($d)){
                $status = 'Belum Lengkap';
            }
            else{
                $status = 'Sudah Lengkap';
            }
            return view('tabel.tabeldatakp2021-2025', compact('status'));
        }
    }
}
