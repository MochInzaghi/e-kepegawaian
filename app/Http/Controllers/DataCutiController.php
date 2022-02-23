<?php

namespace App\Http\Controllers;

use App\Models\DataCuti;
use Illuminate\Http\Request;

class DataCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($request->has('cari')) {
    		$data_cuti = \App\Models\DataCuti::where('namapegawai', 'LIKE', '%'.$request->cari.'%')->get();
    	}else{
    		$data_cuti = \App\Models\DataCuti::all();
    	}
    	return view('tabel.tabeldatacuti', ['data_cuti' => $data_cuti]);
    }

    public function create()
    {
        return view('form.formaddcuti');
    }

    public function store(Request $request)
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

        $attr = $request->all();
        \App\Models\DataCuti::create($attr);

        session()->flash('success', 'Data Cuti berhasil di Tambahkan');

        return redirect('admin/datacuti');
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
}
