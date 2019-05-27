<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use File;
use App\Helpers\log;

class pegawaicontroller extends Controller
{
    public function petugas(){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
        $nama=Session::get('nama');
        $pict=Session::get('pict');
        $hakakses=Session::get('hakakses');
        $id_petugas=Session::get('id_petugas');
        $listP = DB::table('detail_petugas')->get();

        return view('pegawai',[
            'nama'=>$nama,
            'pict'=>$pict,
            'hakakses'=>$hakakses,
            'listP'=>$listP,
            'id_petugas'=>$id_petugas
        ]);
        }
    }

    public function tambah_petugas(){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            return view('register',[
                'hakakses'=>$hakakses
            ]);
        }
    }
    public function detail_petugas($id_petugas){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
        $nama=Session::get('nama');
        $pict=Session::get('pict');
        $data=DB::table('detail_petugas')->where('id_petugas',$id_petugas)->first();
        $log=DB::table('log')->where('id_petugas',$id_petugas)->get();
        return view('detail_petugas',[
            'nama'=>$nama,
            'pict'=>$pict,
            'data'=>$data,
            'log'=>$log
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
        $status=$req->status;//d
        $jumlah_anak=$req->jumlah_anak;//d
        $jk=$req->jk;//d
        $agama=$req->agama;//d
        $alamat=$req->alamat;//d
        $no_tlfn=$req->no_tlfn;//d
        $hakakses=$req->hakakses;
        $password=$req->password;
        $Upassword=$req->Upassword;
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
        $pict->move(public_path().'/image/foto_petugas',$pictAacak.$npict);
        //jenis Kelamin
        if ($jk=="L") {
            $jkid='1';
        }else{
            $jkid='2';
        }
        //tanggal
        $now = \Carbon\Carbon::now('Asia/Jakarta');
        $tahun=$now->format('y');
        $bulan=$now->format('m');

        $id_petugas=$tahun.$bulan.$jkid.$idstring;
        $cek=DB::table('header_petugas')->where('id_petugas',$id_petugas)->count();

        if ($password==$Upassword) {
            if ($cek==0) {
                $pass=md5($password);
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
        }else {
            return redirect('/tambah_petugas')->with("alert","Validasi Password Gagal");
        }
        }
    }

    public function delete_petugas($id_petugas){
        $status = Session::get('status');
        $hakakses=Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            $cari=DB::table('header_petugas')->join('detail_petugas','header_petugas.id_petugas','=','detail_petugas.id_petugas')->where('header_petugas.id_petugas',$id_petugas);
            $cariC=$cari->count();
            $cariD=$cari->first();
            if ($cariC>=1 AND $hakakses == 'admin') {
                //log
                log::insertlog('Hapus Petugas'." ".$cariD->nama,'');
                //delete
                    File::delete('image/foto_petugas/'.$cariD->pict);
                DB::table('detail_petugas')->where('id_petugas',$id_petugas)->delete();
                DB::table('header_petugas')->where('id_petugas',$id_petugas)->delete();
                return redirect('/data_petugas')
                    ->with("successalert","Berhasil Menghapus Data Karyawan Dengan Nama"." ".$cariD->nama);
            }else {
                return redirect('/data_petugas')->with("alert","Anda Tidak Bisa Menghapus Data Ini");
            }
        }
    }

    public function edit_petugas($id_petugas){
        $nama = Session::get('nama');
        $pict=Session::get('pict');
        $hakakses=Session::get('hakakses');
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }elseif ($hakakses =='karyawan') {
            return redirect('/data_petugas')->with('alert','Anda Tidak Bisa Mengedit');
        }else {
            $cari=DB::table('header_petugas')->join('detail_petugas','header_petugas.id_petugas','=','detail_petugas.id_petugas')->where('header_petugas.id_petugas',$id_petugas);
            $cariC=$cari->count();
            $cariD=$cari->first();


            return view('edit_petugas',[
                'cariD'=>$cariD,
                'pict'=>$pict,
                'nama'=>$nama
            ]);
        }
    }

    public function simpan_edit_petugas(Request $req){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            $id=$req->id;
            $nama=$req->name;
            $nik=$req->nik;
            $email=$req->email;
            $status=$req->status;
            $jumlah_anak=$req->jumlah_anak;
            $jk=$req->jk;
            $agama=$req->agama;
            $alamat=$req->alamat;
            $no_tlfn=$req->no_tlfn;
            $hakakses=$req->hakakses;//h
            $Tpict=$req->Tpict;

            if ($Tpict=='') {
                $updateH=['hakakses'=>$hakakses];
                $updateD=[
                    'nama'=>$nama,
                    'nik'=>$nik,
                    'email'=>$email,
                    'status'=>$status,
                    'jumlah_anak'=>$jumlah_anak,
                    'jk'=>$jk,
                    'agama'=>$agama,
                    'alamat'=>$alamat,
                    'no_tlfn'=>$no_tlfn];
                DB::table('header_petugas')->where('id_petugas',$id)->update($updateH);
                DB::table('detail_petugas')->where('id_petugas',$id)->update($updateD);
                log::insertlog('Update Karyawan'." ".$nama,'');
                return redirect('/data_petugas')
                    ->with("successalert","Berhasil Mengupdate Data Karyawan Dengan Nama"." ".$nama);
            }else {

                $data=DB::table('detail_petugas')->where('id_petugas',$id)->first();
                File::delete('image/foto_petugas/'.$data->pict);
                //foto
                $angka=range(0,9);
                shuffle($angka);
                $pictA=array_rand($angka,5);
                $pictAstring=implode($pictA);
                $pictAacak=$pictAstring;

                $pict=$req->file('pict');
                $npict=$pict->getClientOriginalName();
                $Npict=$pictAacak.$npict;
                $pict->move(public_path().'/image/foto_petugas',$pictAacak.$npict);

                $updateH=['hakakses'=>$hakakses];
                $updateD=[
                    'nama'=>$nama,
                    'nik'=>$nik,
                    'email'=>$email,
                    'status'=>$status,
                    'jumlah_anak'=>$jumlah_anak,
                    'jk'=>$jk,
                    'agama'=>$agama,
                    'alamat'=>$alamat,
                    'no_tlfn'=>$no_tlfn,
                    'pict'=>$Npict];
                DB::table('header_petugas')->where('id_petugas',$id)->update($updateH);
                DB::table('detail_petugas')->where('id_petugas',$id)->update($updateD);
                log::insertlog('Update Karyawan'." ".$nama,'');
                return redirect('/data_petugas')
                    ->with("successalert","Berhasil Mengupdate Data Karyawan Dengan Nama"." ".$nama);
            }
        }
    }
}
