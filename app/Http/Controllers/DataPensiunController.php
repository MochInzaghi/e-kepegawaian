<?php

namespace App\Http\Controllers;

use App\Models\DataPensiun;
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
            $data_pensiun = \App\Models\DataPegawai::with('pegawaiPensiun')->where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_pensiun = \App\Models\DataPegawai::with('pegawaiPensiun')->get();
        }
        return view('tabel.tabeldatapensiun', ['data_pensiun' => $data_pensiun]);
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
    public function edit(DataPensiun $dataPensiun)
    {
        return view('form.formeditpensiun', compact('dataPensiun'));
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
        $attr = request()->validate([
            'tl_sk_pertama' => 'required',
            'tmt_58' => 'required',
            'tmt_60' => 'required',
            'tanggal' => 'required',
            'no_sk' => 'required',
            'keterangan_pensiun' => 'required',
        ]);

        $dataPensiun->update($attr);

        session()->flash('success', 'Data Pensiun Berhasil di Update');

        return redirect('admin/datapensiun');
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
