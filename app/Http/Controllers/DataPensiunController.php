<?php

namespace App\Http\Controllers;

use App\Models\DataPensiun;
use App\Models\DataPegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\isEmpty;

class DataPensiunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; 
            $data_pensiun = \App\Models\DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; 
            $data_pensiun = \App\Models\DataPegawai::all();
        }
        return view('tabel.tabeldatapensiun', compact('data_pensiun', 'bulan'));
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
     * @param  \App\Models\DataPensiun  $dataPensiun
     * @return \Illuminate\Http\Response
     */
    public function show(DataPensiun $dataPensiun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPensiun  $dataPensiun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pegawai = DataPegawai::find($id);
        if (!$data_pegawai) {
            abort(404);
        }

        return view('form.formeditpensiun', ['data_pegawai' => $data_pegawai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPensiun  $dataPensiun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPensiun $dataPensiun)
    {
        try{
        $request->validate([
                'tl_sk_pertama' => 'required',
                'tmt_58' => 'required',
                'tmt_60' => 'required',
                'tanggal' => 'required',
                'no_sk' => 'required',
                'keterangan_pensiun' => 'required',
        ]);
        DataPensiun::updateorCreate(
            ['data_pegawai_id' => $request->data_pegawai_id],
            [
                'tl_sk_pertama' => $request->tl_sk_pertama,
                'tmt_58' => $request->tmt_58,
                'tmt_60' => $request->tmt_60,
                'tanggal' => $request->tanggal,
                'no_sk' => $request->no_sk,
                'keterangan_pensiun' => $request->keterangan_pensiun,
            ]
        );

        return redirect('/admin/datapensiun')->with('success', 'Data Pensiun Berhasil di Update');
    }catch (Exception $e) {
        // dd($e);
        Alert::error('Gagal', 'Gagal Mengupdate Data Pensiun');
        return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPensiun  $dataPensiun
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPensiun $dataPensiun)
    {
        //
    }

    public function print(Request $request){
        $namabulan = [
            'empty' => 0, 
            '01' => 'Januari', 
            '02' =>'Februari', 
            '03' =>'Maret', 
            '04' =>'April', 
            '05' =>'Mei', 
            '06' =>'Juni', 
            '07' =>'Juli', 
            '08' =>'Agustus', 
            '09' =>'September', 
            '10' =>'Oktober', 
            '11' =>'November', 
            '12' =>'Desember'
        ];
        $datebulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        if ($request->input('bulan') != '1' && $request->input('tahun') != '1') {
            $inputbulan = $request->input('bulan');
            $bulan = $namabulan[$inputbulan];
            $tahun = $request->input('tahun');
            $data_pensiun = DataPensiun::whereMonth('updated_at', $inputbulan)->whereYear('updated_at', $tahun)->get();
            $datapegawai = [];
            if($data_pensiun->isEmpty()){
                Alert::error('Not Found', 'Data Pensiun Tidak Ditemukan');
                return view('errors.404');
            }else{
                foreach ($data_pensiun as $pensiun) {
                    $datapegawai[] = DataPegawai::where('id', 'LIKE', '%' . $pensiun->data_pegawai_id . '%')->get();
                }
               
                return view('laporan.datapensiun', compact('data_pensiun', 'bulan', 'tahun','datapegawai', 'datebulan'));
            }
            
        }else{
            Alert::error('Not Found', 'Data Pensiun Tidak Ditemukan');
            return view('errors.404');
        }
    }
}
