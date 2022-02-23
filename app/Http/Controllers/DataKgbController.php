<?php

namespace App\Http\Controllers;

use App\Models\DataKgb;
use Illuminate\Http\Request;

class DataKgbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tabel.tabeldatakgb2021-2025');
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
     * @param  \App\Models\DataKgb  $dataKgb
     * @return \Illuminate\Http\Response
     */
    public function show(DataKgb $dataKgb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataKgb  $dataKgb
     * @return \Illuminate\Http\Response
     */
    public function edit(DataKgb $dataKgb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataKgb  $dataKgb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataKgb $dataKgb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataKgb  $dataKgb
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataKgb $dataKgb)
    {
        //
    }
}
