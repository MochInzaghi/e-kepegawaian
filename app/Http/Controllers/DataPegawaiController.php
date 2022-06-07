<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator as ValidationValidator;
use Nette\Utils\Validators;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

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
        try {
            $validator = Validator::make($request->all(), [
                'namapegawai' => 'required',
                'nip' => 'required|numeric|digits:18',
                'ttl' => 'required',
                'pangkat' => 'required',
                'jabatan' => 'required',
                'jenjang' => 'required',
                'notelp' => 'required|numeric|digits:13',
                'kgb' => 'required',
                'kp' => 'required',
                'gajipokok' => 'required',
                'keterangan' => 'required',
            ]);

            // if ($validator->fails()) {
            //     Alert::error('Gagal', 'Gagal Menambahkan Data Pegawai');
            //     return back();
            // }

            DataPegawai::create($validator->validate());

            return redirect('admin/datapegawai')->with('success', 'Data Pegawai Berhasil di Tambahkan');
        } catch (Exception $e) {
            // dd($e);
            Alert::error('Gagal', 'Gagal Menambahkan Data Pegawai');
            return back();
        }
    }

    public function edit(DataPegawai $dataPegawai)
    {
        return view('form.formeditpegawai', compact('dataPegawai'));
    }

    public function update(Request $request, DataPegawai $dataPegawai)
    {

        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'namapegawai' => 'required',
                'nip' => 'required|numeric|digits:18',
                'ttl' => 'required',
                'pangkat' => 'required',
                'jabatan' => 'required',
                'jenjang' => 'required',
                'notelp' => 'required|numeric|digits:13',
                'kgb' => 'required',
                'kp' => 'required',
                'gajipokok' => 'required',
                'keterangan' => 'required',
            ]);
            $dataPegawai->update($validator->validate());

            return redirect('admin/datapegawai')->with('success', 'Data Pegawai Berhasil di Update');
        } catch (Exception $e) {
            // dd($e);
            Alert::error('Gagal', 'Gagal Mengupdate Data Pegawai');
            return back();
        }
    }

    public function destroy(DataPegawai $dataPegawai)
    {
        $dataPegawai->delete();
        return redirect('admin/datapegawai')->with('success', 'Data Pegawai Berhasil di Hapus');
    }
}
