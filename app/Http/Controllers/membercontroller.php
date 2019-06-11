<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use File;
use App\Helpers\log;

class membercontroller extends Controller
{
    public function member(){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
        $nama=Session::get('nama');
        $pict=Session::get('pict');
        $hakakses=Session::get('hakakses');
        $id_petugas=Session::get('id_petugas');
        $listM = DB::table('detail_member')->get();

        return view('data_member',[
            'nama'=>$nama,
            'pict'=>$pict,
            'hakakses'=>$hakakses,
            'listM'=>$listM,
            'id_petugas'=>$id_petugas
        ]);
        }
    }

    public function tambah_member(){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            $jenis=DB::table('jenis_kendaraan')->get();
            return view('tambah_member',[
                'hakakses'=>$hakakses,
                'jenis'=>$jenis
            ]);
        }
    }

    public function simpan_petugas(Request $req){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
        $Fname=$req->first_name;
        $Lname=$req->last_name;
        $nama=$Fname ." ". $Lname;//d

        $nik=$req->nik;//d
        $email=$req->email;//d
        $no_tlfn=$req->no_tlfn;//d
        $jk=$req->jk;//d
        $agama=$req->agama;//d
        $alamat=$req->alamat;//d
        $saldo=$req->saldo;
        $jenisK=$req->jenis_kendaraan;
        $namaK=$req->nama_kendaraan;

        $plat1=$req->no_plat1;
        $plat2=$req->no_plat2;
        $plat3=$req->no_plat3;
        $no_plat=$plat1.$plat2.$plat3;

        $tahunK=$req->tahun_kendaraan;
        $no_rangka=$req->no_rangka;

        //shuffleid
        $angka=range(0,9);
        shuffle($angka);
        $id=array_rand($angka,3);
        $idstring=implode($id);
        $idacak=$idstring;

        //FOTO
        $pictA=array_rand($angka,5);
        $pictAstring=implode($pictA);
        $pictAacak=$pictAstring;

        $pict=$req->file('pict');
        $npict=$pict->getClientOriginalName();
        $Npict=$pictAacak.$npict;
        $pict->move(public_path().'/image/foto_kendaraan',$pictAacak.$npict);
        //jenis Kelamin
        if ($jk=="L") {
            $jkid='1';
        }else{
            $jkid='2';
        }
        //tanggal
        $tahun=date('y');
        $bulan=date('m');

        $id_kendaraan=$tahun.$bulan.$plat2.$idstring;
        $id_member=$tahun.$bulan.$jkid.$idstring;

        $cek=DB::table('header_member')->where('id_member',$id_member)->count();

            if ($cek==0) {
                $saveH=[
                    'id_petugas'=>$id_petugas,
                    'password'=>$pass,
                    'hakakses'=>$hakakses,
                    'status'=>''
                ];
                $saveD=[
                    'id_petugas'=>$id_petugas,
                    'nik'=>$nik,
                    'nama'=>$nama,
                    'status'=>$status,
                    'jumlah_anak'=>$jumlah_anak,
                    'email'=>$email,
                    'jk'=>$jk,
                    'agama'=>$agama,
                    'alamat'=>$alamat,
                    'no_tlfn'=>$no_tlfn,
                    'pict'=>$Npict
                ];
                $simpan=DB::table('header_petugas')->insert($saveH);

                if ($simpan) {
                    //log
                    log::insertlog('Tambah Data Petugas'." ".$nama,'');
                    //add
                    DB::table('detail_petugas')->insert($saveD);
                    return redirect('/data_petugas')
                        ->with("successalert","Berhasil Menambahkan Data Karyawan Dengan Nama"." ".$nama);
                }else {
                    return redirect('/tambah_petugas')->with("alert","Gagal Menambah Data Petugas");
                }

            }else {
                return redirect('/tambah_petugas')->with("alert","Gagal Menambah Data Petugas");
            }
        }
    }
}
