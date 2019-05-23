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
    public function detail_petugas($id_petugas){
        $nama=Session::get('nama');
        $data=DB::table('detail_petugas')->where('id_petugas',$id_petugas)->first();
        $log=DB::table('log')->where('id_petugas',$id_petugas)->get();
        return view('detail_petugas',[
            'nama'=>$nama,
            'data'=>$data,
            'log'=>$log
        ]);
    }
    public function simpan(Request $req){
        $Fname=$req->first_name;
        $Lname=$req->last_name;
        $name=$Fname ." ". $Lname;
        $nik=$req->nik;
        $email=$req->email;
        $status=$req->status;
        $jumalh_anak=$req->jumlah_anak;
        $jk=$req->jk;
        $agama=$req->agama;
        $alamat=$req->alamat;
        $no_tlfn=$req->no_tlfn;
        $hakakses=$req->hakakses;
        $pict=$req->pict;
        $password=$req->password;
        $Upassword=$req->Upassword;
    }
}
