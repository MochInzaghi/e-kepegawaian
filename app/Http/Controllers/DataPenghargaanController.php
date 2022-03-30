<?php

namespace App\Http\Controllers;

use App\Models\DataPenghargaan;
use App\Models\DataPegawai;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            $data_penghargaan = \App\Models\DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_penghargaan = \App\Models\DataPegawai::all();
        }
        return view('tabel.tabeldatapenghargaan', compact('data_penghargaan'));
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
            Alert::error('Gagal', 'Gagal Mengupdate Data Pegawai');
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
}
