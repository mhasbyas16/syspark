<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Helpers\log;

class kendaraancontroller extends Controller
{
    public function data_kendaraan(){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        $nama=Session::get('nama');
        $pict=Session::get('pict');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else{
            $data = DB::table('jenis_kendaraan')->join('merk_kendaraan','jenis_kendaraan.id_jenisk','=','merk_kendaraan.id_jenisk')->get();
            return view('data_kendaraan',[
                'hakakses'=>$hakakses,
                'data'=>$data,
                'pict'=>$pict,
                'nama'=>$nama
            ]);
        }
    }

    public function tambah_kendaraan(){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            return view('tambah_kendaraan',[
                'hakakses'=>$hakakses
            ]);
        }
    }

    public function simpan_kendaraan(Request $req){
        $merk = $req->merk;
        $jenis = $req->jenis;
        $angka=range(0,9);
        //id
        shuffle($angka);
        $id=array_rand($angka,3);
        $idstring=implode($id);
        $idacak=$idstring;

        $jenisD=DB::table('jenis_kendaraan')->where('jenis_k',$jenis)->count();

        if ($jenisD>=1) {
            $saveM=['merk_k'=>$merk,'id_jenisk'=>$jenisD->id_jenisk];
            log::insertlog('Tambah Data kendaraan merk'." ".$merk." "."jenis"." ".$jenis,"");
            DB::table('merk_kendaraan')->insert($saveM);
            return redirect('/data_kendaraan')->with('successalert','Berhasil Menambahkan Data Baru');
        }else{
            $saveJ=['jenis_k'=>$jenis,'id_jenisk'=>$idacak];
            $saveM=['merk_k'=>$merk,'id_jenisk'=>$idacak];
            log::insertlog('Tambah Data kendaraan merk'." ".$merk." "."jenis"." ".$jenis,"");
            DB::table('jenis_kendaraan')->insert($saveJ);
            DB::table('merk_kendaraan')->insert($saveM);
            return redirect('/data_kendaraan')->with('successalert','Berhasil Menambahkan Data Baru');
        }
    }

    public function delete_kendaraan($id_jenisk){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            $data = DB::table('jenis_kendaraan')->join('merk_kendaraan','jenis_kendaraan.id_jenisk','=','merk_kendaraan.id_jenisk')->where('jenis_kendaraan.id_jenisk',$id_jenisk);
            $dataC=$data->count();
            $dataD=$data->first();

            if ($dataC>=1 AND $hakakses=='admin') {
                log::insertlog("Menghapus Data Kendaraan Merk"." ".$dataD->merk_k."Jenis"." ".$dataD->jenis_k,"");
                DB::table('merk_kendaraan')->where('id_merk',$dataD->id_merk)->delete();
                return redirect('/data_kendaraan')->with('successalert','Berhasil Menghapus Data Merk'.' '.$dataD->merk_k.' Jenis '.' '.$dataD->jenis_k);
            }else {
                return redirect('/data_kendaraan')->with('alert','Gagal Menghapus Data');
            }
        }
    }

    public function edit_kendaraan($id_jenisk){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            $isi = DB::table('jenis_kendaraan')->join('merk_kendaraan','jenis_kendaraan.id_jenisk','=','merk_kendaraan.id_jenisk')->where('jenis_kendaraan.id_jenisk',$id_jenisk)->first();

            return view('edit_kendaraan',[
                'isi'=>$isi,
                'hakakses'=>$hakakses
            ]);
        }
    }

    public function simpan_edit_kendaraan(Request $req){
        $merk=$req->merk;
        $jenis=$req->jenis;
        $id_jenisk=$req->id_jenisk;

        $save=['merk_k'=>$merk,'jenis_k'=>$jenis];
        log::insertlog('Merubah Data kendaraan Merk '.$merk.' Jenis '.$jenis,'');
        DB::table('jenis_kendaraan')->join('merk_kendaraan','jenis_kendaraan.id_jenisk','=','merk_kendaraan.id_jenisk')->where('jenis_kendaraan.id_jenisk',$id_jenisk)->update($save);
        return redirect('/data_kendaraan')->with('successalert','Merubah Data kendaraan Merk '.$merk.' Jenis '.$jenis);
    }
}
