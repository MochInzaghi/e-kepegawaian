<?php

namespace App\Http\Controllers;

use App\Models\DataDuk;
use Illuminate\Http\Request;

class DataDukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tabel.tabeldataduk');
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
    public function edit(DataDuk $dataDuk)
    {
        //
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
        //
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
