<?php

namespace App\Http\Controllers;

use App\Models\DataDuk;
use App\Models\DataPegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataDukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_duk = \App\Models\DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_duk = \App\Models\DataPegawai::all();
        }
        return view('tabel.tabeldataduk', compact('data_duk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  \App\Models\DataDuk  $dataDuk
     * @return \Illuminate\Http\Response
     */
    public function show(DataDuk $dataDuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataDuk  $dataDuk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pegawai = DataPegawai::find($id);
        if (!$data_pegawai) {
            abort(404);
        }

        return view('form.formeditduk', ['data_pegawai' => $data_pegawai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataDuk  $dataDuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
        $request->validate([
                'tmt' => 'required',
                'jabatanterakhir' =>'required',
                'mk_tahun' => 'required',
                'mk_bulan' => 'required',
                'pendidikan_kepemimpinan' => 'required',
                'tahunlulus' => 'required',
                'pendidikan_terakhir' => 'required',
                'tahun_lulus' => 'required',
                'jeniskelamin' => 'required',
                'agama_tahun' => 'required',
                'tahunpensiun' => 'required',
                'keterangan_duk' => 'required',
        ]);
        DataDuk::updateorCreate(
            ['data_pegawai_id' => $request->data_pegawai_id],
            [
                'tmt' => $request->tmt,
                'jabatanterakhir' => $request->jabatanterakhir,
                'mk_tahun' => $request->mk_tahun,
                'mk_bulan' => $request->mk_bulan,
                'pendidikan_kepemimpinan' => $request->pendidikan_kepemimpinan,
                'tahunlulus' => $request->tahunlulus,
                'pendidikan_terakhir' => $request->pendidikan_terakhir,
                'tahun_lulus' => $request->tahun_lulus,
                'jeniskelamin' => $request->jeniskelamin,
                'agama_tahun' => $request->agama_tahun,
                'tahunpensiun' => $request->tahunpensiun,
                'keterangan_duk' => $request->keterangan_duk,
            ]
        );

        return redirect('/admin/dataduk')->with('success', 'Data DUK Berhasil di Update');
    } catch (Exception $e) {
        // dd($e);
        Alert::error('Gagal', 'Gagal Mengupdate Data DUK');
        return back();
    }

        //return redirect('admin/dataduk', $data_duk);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataDuk  $dataDuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataDuk $dataDuk)
    {
        //
    }

    public function print(Request $request){
        if ($request->input('bulan') != '1' && $request->input('tahun') != '1') {
            $bulan = $request->input('bulan');
            $tahun = $request->input('tahun');
            $data_duk = DataDuk::whereMonth('updated_at', $bulan)->whereYear('updated_at', $tahun)->get();
           
            return view('laporan.dataduk', compact('data_duk', 'bulan', 'tahun'));
        }else{
            Alert::error('Not Found', 'Data DUK Tidak Ditemukan');
            return view('errors.404');
        }
    }

}
