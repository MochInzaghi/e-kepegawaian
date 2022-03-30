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
            $data_cuti = \App\Models\DataCuti::where('namapegawai', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_cuti = \App\Models\DataCuti::all();
        }
        return view('tabel.tabeldatacuti', compact('data_cuti'));
    }

    public function create()
    {
        return view('form.formaddcuti');
    }

    public function store(Request $request)
    {
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

        if ($validator->fails()) {
            Alert::error('Gagal', 'Gagal Menambahkan Data Cuti');
            return back();
        }

        DataCuti::create($request->all());

        return redirect('admin/datacuti')->with('success', 'Data Cuti Berhasil di Tambahkan');
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
        $attr = request()->validate([
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

        $dataPegawai->update($attr);

        session()->flash('success', 'Data Cuti Berhasil di Update');

        return redirect('admin/datacuti');
    }

    public function destroy(DataCuti $dataCuti)
    {
        $dataCuti->delete();
        session()->flash('success', 'Data Cuti Berhasil di Hapus');
        return redirect('admin/datacuti');
    }

    public function print(){
        $data_cuti = \App\Models\DataCuti::all();
        return view('laporan.datacuti', compact('data_cuti'));
    }
}
 