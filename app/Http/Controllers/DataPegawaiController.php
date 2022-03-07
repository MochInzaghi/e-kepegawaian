<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_pegawai = \App\Models\DataPegawai::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_pegawai = \App\Models\DataPegawai::all();
        }
        return view('tabel.tabeldatapegawai', ['data_pegawai' => $data_pegawai]);
    }

    public function create()
    {
        return view('form.formaddpegawai');
    }

    public function store(Request $request)
    {

        $attr = request()->validate([
            'namapegawai' => 'required',
            'nip' => 'required',
            'ttl' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'jenjang' => 'required',
            'notelp' => 'required',
            'kgb' => 'required',
            'kp' => 'required',
            'gajipokok' => 'required',
            'keterangan' => 'required',
        ]);

        $attr = $request->all();
        DataPegawai::create($attr);

        session()->flash('success', 'Data Pegawai berhasil di Tambahkan');

        return redirect('admin/datapegawai');
    }

    public function edit(DataPegawai $dataPegawai)
    {
        return view('form.formeditpegawai', compact('dataPegawai'));
    }

    public function update(Request $request, DataPegawai $dataPegawai)
    {
        $attr = request()->validate([
            'namapegawai' => 'required',
            'nip' => 'required',
            'ttl' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'jenjang' => 'required',
            'notelp' => 'required',
            'kgb' => 'required',
            'kp' => 'required',
            'gajipokok' => 'required',
            'keterangan' => 'required',
        ]);

        $dataPegawai->update($attr);

        session()->flash('success', 'Data Pegawai Berhasil di Update');

        return redirect('admin/datapegawai');
    }

    public function destroy(DataPegawai $dataPegawai)
    {
        $dataPegawai->delete();
        session()->flash('success', 'Data Pegawai Berhasil di Hapus');
        return redirect('admin/datapegawai');
    }
}
