<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class monthly extends Controller
{
    public function Reportmonthly(){
        $nama=Session::get('nama');
        $pict=Session::get('pict');
        $reportm = DB::table('detail_petugas')->get();

        return view('monthly',[
            'reportm'=>$reportm,
            'pict'=>$pict,
            'nama'=>$nama
        ]);
    }
}
