<?php

namespace App\Http\Controllers;

use App\Models\DataKgb;
use App\Models\DataPegawai;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateInterval;
use DatePeriod;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator as ValidationValidator;
use Nette\Utils\Validators;
use Validator;

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
        
        $start = $request->input('startdate'); 
        $end = $request->input('enddate');
        $start_date = date_create($start);            
        $end_date   = date_create($end);


        // $start_date = date_create("2021-01-01");
        // $end_date   = date_create("2025-12-31");
        $interval = new DateInterval('P1Y');
        $daterange = new DatePeriod($start_date, $interval, $end_date);


        $dates = [];
        foreach ($daterange as $date) {
            $dates[] = $date->format('Y');
        }

        if ($request->has('cari')) {$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
             
            $datapegawai = DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
            $kgbPegawai['year'] = [];
            $kgbPegawai['idKGB'] = [];
            foreach ($datapegawai as $dp) {
                $varTemp = ((int) date_format(date_create($dp->kgb), 'Y'));
                do{
                    $varTemp+=2;
                }while($varTemp < $dates[0]);
                // dump('id: '.$dp->id." kgb: ".$dp->kgb);
                foreach ($dates as $date) {
                    if($varTemp == (int) $date){
                        $checkDataKGB = DataKgb::where([
                            ['data_pegawai_id', '=', $dp->id],
                            ['tahun', '=', $varTemp]
                        ])->first();
                        $kgbPegawai['year'][$dp->id][] = $varTemp;
                        $kgbPegawai['idKGB'][$dp->id][$varTemp] = $checkDataKGB;
                        $varTemp += 2;
                    }
                }
            }
            return view('tabel.tabeldatakgb2021-2025', compact('dates', 'datapegawai', 'kgbPegawai', 'bulan'));
        } else {
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; 
            $datapegawai = DataPegawai::with('pegawaiKgb')->get();
            // $datakgb = DataKgb::all();
            $kgbPegawai['year'] = [];
            $kgbPegawai['idKGB'] = [];
            foreach ($datapegawai as $dp) {
                $varTemp = ((int) date_format(date_create($dp->kgb), 'Y'));
                do{
                    $varTemp+=2;
                }while($varTemp < $dates[0]);
                // dump('id: '.$dp->id." kgb: ".$dp->kgb);
                foreach ($dates as $date) {
                    if($varTemp == (int) $date){
                        $checkDataKGB = DataKgb::where([
                            ['data_pegawai_id', '=', $dp->id],
                            ['tahun', '=', $varTemp]
                        ])->first();
                        $kgbPegawai['year'][$dp->id][] = $varTemp;
                        $kgbPegawai['idKGB'][$dp->id][$varTemp] = $checkDataKGB;
                        $varTemp += 2;
                    }
                }
            }

            // dump($kgbPegawai);
            return view('tabel.tabeldatakgb2021-2025', compact('dates', 'datapegawai', 'kgbPegawai', 'bulan'));
        }
        // foreach ($datapegawai as $dp) {
        //     $dp->kgb = Carbon::createFromFormat('d-m-Y', $dp->kgb)->addYear(2);
        // }
        // dd($datapegawai->pegawaiKgb[0]->olehpejabat);

       
        // return 'oke';

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datapegawai = DataPegawai::with('pegawaiKgb')->find($id);
        $datakgb = $datapegawai->pegawaiKgb;
        // return $datapegawai;
        return view('form.forminsertkgb', compact('datapegawai', 'datakgb'));
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
            $validator = Validator::make($request->all(), [
                'data_pegawai_id' => 'required',
                'tgl_lahir' => 'required',
                'tgl' => 'required',
                'oleh_pejabat' => 'required',
                'tgl_gaji' => 'required',
                'masakerja_tgl' => 'required',
                'gajibaru' => 'required',
                'masakerja' => 'required',
                'gol_ruang' => 'required',
                'mulai_tgl' => 'required',
                'tahun' => 'required',
            ]);

            // if ($validator->fails()) {
            //     Alert::error('Gagal', 'Gagal Menambahkan Data Pegawai');
            //     return back();
            // }

            DataKgb::create($validator->validate());
            return Redirect::to('/admin/datakgb?startdate=2021-01-01&enddate=2025-12-31')->with('success', 'Data KGB Berhasil di Tambahkan');
        } catch (Exception $e) {
            // dd($e);
            Alert::error('Gagal', 'Gagal Menambahkan Data KGB');
            return back();
        }
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
        $datakgb = DataKgb::find($id);
        $datapegawai = $datakgb->getPegawai;
        // $datakgb = $datapegawai->pegawaiKgb;
        // return $datapegawai;
        return view('form.formeditkgb', compact('datakgb','datapegawai'));
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
        // dd($dataKgb);
        // if($dataKgb->update($request->all())){
        //     return 'success';
        // }else{
        //     return 'failed';
        // }
        try {
            $validator = Validator::make($request->all(),
                [
                'data_pegawai_id' => 'required',
                'tgl_lahir' => 'required',
                'tgl' => 'required',
                'oleh_pejabat' => 'required',
                'tgl_gaji' => 'required',
                'masakerja_tgl' => 'required',
                'gajibaru' => 'required',
                'masakerja' => 'required',
                'gol_ruang' => 'required',
                'mulai_tgl' => 'required',
                'tahun' => 'required',
                ]
            );
            // dd($validator->validate());

            // if ($validator->fails()) {
            //     Alert::error('Gagal', 'Gagal');
            //     return back();
            // }
             
            $dataKgb->update($validator->validate());
            return Redirect::to('/admin/datakgb?startdate=2021-01-01&enddate=2025-12-31')->with('success', 'Data KGB Berhasil di Update');
        }catch(Exception $e){
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
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $datakgb = DataKgb::find($id);
        // dd($datakgb);
        if (empty($datakgb)) {
            Alert::error('Not Found', 'Data Kenaikan Gaji Berkala Masih Kosong');
            return view('errors.404');
        }
        $datapegawai = $datakgb->getPegawai;
        return view('laporan.datakgb', compact('datapegawai', 'datakgb', 'bulan'));
    }

    public function showModalKgb(Request $request, $id)
    {
        // $datakgb = DataKgb::where('data_pegawai_id', $id)->with('getPegawai')->first();
       $datakgb = DataKgb::find($id);
        // dd($datakgb);
        $datapegawai = $datakgb->getPegawai;
        return view('modal.modal-view-kgb', compact('datapegawai', 'datakgb'));
    }

    public function error(){
        Alert::error('Not Found', 'Data Kenaikan Gaji Berkala Masih Kosong');
        return view('errors.404');
    }
}
