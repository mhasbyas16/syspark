<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class pegawaicontroller extends Controller
{
    public function petugas(){
        $nama=Session::get('nama');
        $listP = DB::table('detail_petugas')->get();

        return view('pegawai',[
            'nama'=>$nama,
            'listP'=>$listP
        ]);
    }
}
