<?php

namespace App\Http\Controllers;

use App\Models\DataPensiun;
use App\Models\DataPegawai;
use Illuminate\Http\Request;

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
            $data_pensiun = \App\Models\DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_pensiun = \App\Models\DataPegawai::all();
        }
        return view('tabel.tabeldatapensiun', compact('data_pensiun'));
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
        $data_pensiun = DataPensiun::updateorCreate(
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

        session()->flash('success', 'Data Pensiun Berhasil di Update');
        return redirect('/admin/datapensiun');
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
}
