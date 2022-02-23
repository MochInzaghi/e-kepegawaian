<?php

namespace App\Http\Controllers;

use App\Models\DataPenghargaan;
use Illuminate\Http\Request;

class DataPenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tabel.tabeldatapenghargaan');
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
    public function edit(DataPenghargaan $dataPenghargaan)
    {
        //
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
        //
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
