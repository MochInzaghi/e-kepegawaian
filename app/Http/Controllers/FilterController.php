<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request){
        $start = $request->input('startdate');
        $end   = $request->input('enddate');
        return $start;
    }
}
