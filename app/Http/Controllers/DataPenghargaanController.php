<?php

namespace App\Http\Controllers;

use App\Models\DataPenghargaan;
use App\Models\DataPegawai;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function PHPUnit\Framework\isEmpty;

class DataPenghargaanController extends Controller
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
            $data_penghargaan = \App\Models\DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; 
            $data_penghargaan = \App\Models\DataPegawai::all();
        }
        return view('tabel.tabeldatapenghargaan', compact('data_penghargaan', 'bulan'));
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
     * @param  \App\Models\DataPenghargaan  $dataPenghargaan
     * @return \Illuminate\Http\Response
     */
    public function show(DataPenghargaan $dataPenghargaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPenghargaan  $dataPenghargaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pegawai = DataPegawai::find($id);
        if (!$data_pegawai) {
            abort(404);
        }

        return view('form.formeditpenghargaan', ['data_pegawai' => $data_pegawai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPenghargaan  $dataPenghargaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPenghargaan $dataPenghargaan)
    {
        // dd($request->all());
        try {
            $request->validate([
                    'thn_10' => 'required',
                    'thn_20',
                    'thn_30',
            ]);
            DataPenghargaan::updateorCreate(
                ['data_pegawai_id' => $request->data_pegawai_id],
                [
                    'thn_10' => $request->thn_10,
                    'thn_20' => $request->thn_20,
                    'thn_30' => $request->thn_30,
                ]
            );

            return redirect('/admin/datapenghargaan')->with('success', 'Data Penghargaan Berhasil di Update');
        } catch (Exception $e) {
            // dd($e);
            Alert::error('Gagal', 'Gagal Mengupdate Data Penghargaan');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPenghargaan  $dataPenghargaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPenghargaan $dataPenghargaan)
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
        
        if ($request->input('bulan') != '0' && $request->input('tahun') != '0') {
            $inputbulan = $request->input('bulan');
            $bulan = $namabulan[$inputbulan];
            $tahun = $request->input('tahun');
            $data_penghargaan = DataPenghargaan::whereMonth('updated_at', $inputbulan)->whereYear('updated_at', $tahun)->get();
            // dd($data_penghargaan);
            $datapegawai = [];
            if($data_penghargaan->isEmpty()){
                Alert::error('Not Found', 'Data Penghargaan Tidak Ditemukan');
                return view('errors.404');
            }else{
                foreach ($data_penghargaan as $penghargaan) {
                    $datapegawai[] = DataPegawai::where('id', $penghargaan->data_pegawai_id)->first();               
                }
                return view('laporan.datapenghargaan', compact('data_penghargaan', 'bulan', 'tahun', 'datebulan' , 'datapegawai'));
            }   
        }else{
            Alert::error('Not Found', 'Data Penghargaan Tidak Ditemukan');
            return view('errors.404');
        }
    }
}
