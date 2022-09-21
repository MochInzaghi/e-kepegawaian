<?php

namespace App\Http\Controllers;

use App\Models\DataCuti;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator as ValidationValidator;
use Nette\Utils\Validators;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class DataCutiController extends Controller
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
            $data_cuti = \App\Models\DataCuti::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; 
            $data_cuti = \App\Models\DataCuti::all();
        }
        return view('tabel.tabeldatacuti', compact('data_cuti', 'bulan'));
    }

    public function create()
    {
        return view('form.formaddcuti');
    }

    public function store(Request $request)
    {
        try {
        $validator = Validator::make($request->all(), [
            'namapegawai' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'jeniscuti' => 'required',
            'daritgl' => 'required',
            'sampaitgl' => 'required',
            'jmlhrkrj' => 'required',
            'sisacuti' => 'required',
            'pejabat' => 'required',
            'nosurat' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        // if ($validator->fails()) {
        //     Alert::error('Gagal', 'Gagal Menambahkan Data Cuti');
        //     return back();
        // }

        DataCuti::create($validator->validate());

        return redirect('admin/datacuti-index')->with('success', 'Data Cuti Berhasil di Tambahkan');
    } catch (Exception $e) {
        // dd($e);
        Alert::error('Gagal', 'Gagal Menambahkan Data Cuti');
        return back();
    }
    }

    public function show(DataCuti $dataCuti)
    {
        //
    }

    public function edit(DataCuti $dataCuti)
    {
        return view('form.formeditcuti', compact('dataCuti'));
    }

    public function update(Request $request, DataCuti $dataCuti)
    {
        try {
            $validator = Validator::make($request->all(), [
                'namapegawai' => 'required',
                'nip' => 'required',
                'jabatan' => 'required',
                'jeniscuti' => 'required',
                'daritgl' => 'required',
                'sampaitgl' => 'required',
                'jmlhrkrj' => 'required',
                'sisacuti' => 'required',
                'pejabat' => 'required',
                'nosurat' => 'required',
                'tanggal' => 'required',
                'keterangan' => 'required',
        ]);

        $dataCuti->update($validator->validate());

        return redirect('admin/datacuti-index')->with('success', 'Data Cuti Berhasil di Update');

    } catch (Exception $e) {
        // dd($e);
        Alert::error('Gagal', 'Gagal Mengupdate Data Cuti');
        return back();
        }
    }

    public function destroy(DataCuti $dataCuti)
    {
        $dataCuti->delete();
        return redirect('admin/datacuti-index')->with('success', 'Data Cuti Berhasil di Hapus');
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
            $data_cuti = DataCuti::whereMonth('updated_at', $inputbulan)->whereYear('updated_at', $tahun)->get();
           
            return view('laporan.datacuti', compact('data_cuti', 'bulan', 'tahun' , 'datebulan'));
        }else{
            Alert::error('Not Found', 'Data Cuti Tidak Ditemukan');
            return view('errors.404');
        }
    }
}
 