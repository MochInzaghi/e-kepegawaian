<?php

namespace App\Http\Controllers;

use App\Models\DataDuk;
use App\Models\DataPegawai;
use Illuminate\Http\Request;

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
            $data_duk = \App\Models\DataPegawai::with('pegawaiDuk')->where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_duk = \App\Models\DataPegawai::with('pegawaiDuk')->get();
        }
        return view('tabel.tabeldataduk', ['data_duk' => $data_duk]);
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
        //return view('form.formeditduk', compact('dataDuk'));
        $dataedit = DataDuk::where('id', $id)->firstOrFail();
        return $dataedit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataDuk  $dataDuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataDuk $dataDuk)
    {
        $attr = request()->validate([
            'pangkat' => 'required',
            'tmt' => 'required',
            'jabatanterakhir' => 'required',
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

        $dataDuk->update($attr);

        session()->flash('success', 'Data Duk Berhasil di Update');

        return redirect('admin/dataduk');
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
}
