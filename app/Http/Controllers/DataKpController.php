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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Facades\Storage;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Validator as ValidationValidator;
use Nette\Utils\Validators;
use Validator;
use function PHPUnit\Framework\isEmpty;

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

        $start = $request->input('startdate'); 
        $end = $request->input('enddate');
        $start_date = date_create($start);            
        $end_date   = date_create($end);
        $interval = new DateInterval('P1Y');
        $daterange = new DatePeriod($start_date, $interval, $end_date);


        $dates = [];
        foreach ($daterange as $date) {
            $dates[] = $date->format('Y');
        }

        if ($request->has('cari')) {
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $datapegawai = DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
            $kpPegawai['year'] = [];
            $kpPegawai['idKP'] = [];
            foreach ($datapegawai as $dp) {
                $varTemp = ((int) date_format(date_create($dp->kp), 'Y'));
                do{
                    $varTemp+=4;
                }while($varTemp < $dates[0]);
                // dump('id: '.$dp->id." kgb: ".$dp->kgb);
                foreach ($dates as $date) {
                    if($varTemp == (int) $date){
                        $checkDataKP = DataKp::where([
                            ['data_pegawai_id', '=', $dp->id],
                            ['tahun', '=', $varTemp]
                        ])->first();
                        $kpPegawai['year'][$dp->id][] = $varTemp;
                        $kpPegawai['idKP'][$dp->id][$varTemp] = $checkDataKP;
                        $varTemp += 4;
                    }
                }
            }
            return view('tabel.tabeldatakp2021-2025', compact('dates', 'datapegawai', 'kpPegawai', 'bulan'));
        } else {
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $datapegawai = DataPegawai::with('pegawaiKp')->get();
            // $datakgb = DataKgb::all();
            $kpPegawai['year'] = [];
            $kpPegawai['idKP'] = [];
            foreach ($datapegawai as $dp) {
                $varTemp = ((int) date_format(date_create($dp->kp), 'Y'));
                do{
                    $varTemp+=4;
                }while($varTemp < $dates[0]);
                // dump('id: '.$dp->id." kgb: ".$dp->kgb);
                foreach ($dates as $date) {
                    if($varTemp == (int) $date){
                        $checkDataKP = DataKp::where([
                            ['data_pegawai_id', '=', $dp->id],
                            ['tahun', '=', $varTemp]
                        ])->first();
                        $kpPegawai['year'][$dp->id][] = $varTemp;
                        $kpPegawai['idKP'][$dp->id][$varTemp] = $checkDataKP;
                        $varTemp += 4;
                    }
                }
            }

            // dump($kgbPegawai);
            return view('tabel.tabeldatakp2021-2025', compact('dates', 'datapegawai', 'kpPegawai', 'bulan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datapegawai = DataPegawai::with('pegawaiKp')->find($id);
        $datakp = $datapegawai->pegawaiKp;
        // return $datapegawai;
        return view('form.forminsertkp', compact('datapegawai', 'datakp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'data_pegawai_id' => 'required',
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
                'tahun' => 'required',
            ]);

            // if ($validator->fails()) {
            //     Alert::error('Gagal', 'Gagal Menambahkan Data Pegawai');
            //     return back();
            // }
            foreach ($request->file() as $key => $value) {
                // if ($request->hasFile($key)) {
                $this->storeFile($request->file($key), $request->data_pegawai_id, $key, $request->tahun);
                // }
            }
            // dd($validator);
            return Redirect::to('/admin/datakp?startdate=2021-01-01&enddate=2025-12-31')->with('success', 'Data KP Berhasil di Tambahkan');
        } catch (Exception $e) {
            // dd($e);
            Alert::error('Gagal', 'Gagal Menambahkan Data KP');
            return back();
        }
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
        $datapegawai = $datakp->getPegawai;
        // return $datapegawai;
        return view('form.formeditkp', compact('datapegawai','datakp'));
    }

    public function storeFile($fileStore, $user_id, $requestCol, $tahun)
    {
        $file = $fileStore;
        $extension = $file->getClientOriginalExtension();
        $filename = $requestCol . '_' . $tahun . '.' . $extension;
        $file->storeAs("public/files" . " - " . $user_id . "/" . $tahun, $filename);
        DataKp::create([
            'data_pegawai_id' => $user_id,
            $requestCol => $filename,
            'tahun' => $tahun,
        ]);
        return $filename;
    }

    public function updateFile($dataKp, $fileStore, $user_id, $requestCol, $tahun)
    {
        $file = $fileStore;
        $extension = $file->getClientOriginalExtension();
        $filename = $requestCol . '_' . $tahun . '.' . $extension;
        $file->storeAs("public/files" . " - " . $user_id . "/" . $tahun, $filename);
        $dataKp->update([
            'data_pegawai_id' => $user_id,
            $requestCol => $filename,
            'tahun' => $tahun,
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
        // if($dataKp->update($request->all())){
        //     return 'success';
        // }else{
        //     return 'failed';
        // }
        try {
            $this->validate($request, [
                'data_pegawai_id' => 'required',
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
                'tahun' => 'required',
            ]);

            foreach ($request->file() as $key => $value) {
                // if ($request->hasFile($key)) {
                $this->updateFile($request->dataKp, $request->file($key), $request->data_pegawai_id, $key, $request->tahun);
                // }
            }

            // $dataKp->update($validator->validate());

            return Redirect::to('/admin/datakp?startdate=2021-01-01&enddate=2025-12-31')->with('success', 'Data KP Berhasil di Update');
        } catch (Exception $e) {
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
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $datakp = DataKp::find($id);
        if (empty($datakp)) {
            Alert::error('Not Found', 'Data Kenaikan Pangkat Masih Kosong');
            return view('errors.404');
        }
        $datapegawai = $datakp->getPegawai;
        return view('laporan.datakp', compact('datapegawai','datakp', 'bulan'));
    }

    public function showModalKp(Request $request, $id)
    {
        $datakp = DataKp::find($id);
        // dd($datakgb);
        $datapegawai = $datakp->getPegawai;
        return view('modal.modal-view-kp', compact('datapegawai', 'datakp'));
    }

    public function status($id)
    {
        $data = DataKp::find($id);
        return view('tabel.tabeldatakp2021-2025', compact('data'));
    }

    public function error(){
        Alert::error('Not Found', 'Data Kenaikan Pangkat Masih Kosong');
        return view('errors.404');
    }
}
