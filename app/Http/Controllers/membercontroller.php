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
        $listM = DB::table('header_member')->get();

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

    public function simpan_member(Request $req){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
        $Fname=$req->first_name;
        $Lname=$req->last_name;
        $nama=$Fname ." ". $Lname;//h
        $nik=$req->nik;//h
        $email=$req->email;//h
        $no_tlfn=$req->no_tlfn;//h
        $jk=$req->jk;//h
        $agama=$req->agama;//h
        $alamat=$req->alamat;//h
        $saldo=$req->saldo;//h
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

        $id_kendaraan=$tahun.$bulan.$plat2.$tahunK.$idstring;
        $id_member=$tahun.$bulan.$jkid.$idstring;//hd

        $cek=DB::table('header_member')->where('id_member',$id_member)->count();

            if ($cek==0) {
                $saveH=[
                    'id_member'=>$id_member,
                    'nik'=>$nik,
                    'nama'=>$nama,
                    'email'=>$email,
                    'jk'=>$jk,
                    'agama'=>$agama,
                    'alamat'=>$alamat,
                    'no_tlfn'=>$no_tlfn,
                    'saldo'=>$saldo
                ];
                $saveD=[
                    'id_member'=>$id_member,
                    'id_kendaraan'=>$id_kendaraan,
                    'id_jenisk'=>$jenisK,
                    'no_plat'=>$no_plat,
                    'nama_kendaraan'=>$namaK,
                    'tahun'=>$tahunK,
                    'no_rangka'=>$no_rangka,
                    'foto'=>$Npict
                ];
                $simpan=DB::table('header_member')->insert($saveH);

                if ($simpan) {
                    //log
                    log::insertlog('Tambah Data member'." ".$nama,'');
                    //add
                    DB::table('detail_member')->insert($saveD);
                    return redirect('/data_member')
                        ->with("successalert","Berhasil Menambahkan Data Member Dengan Nama"." ".$nama);
                }else {
                    return redirect('/tambah_member')->with("alert","Gagal Menambah Data Petugas");
                }

            }else {
                return redirect('/tambah_member')->with("alert","Gagal Menambah Data Petugas");
            }
        }
    }

    public function detail_member($id_member){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
        $nama=Session::get('nama');
        $pict=Session::get('pict');
        $data=DB::table('header_member')->join('detail_member','header_member.id_member','=','detail_member.id_member')
        ->join('jenis_kendaraan','jenis_kendaraan.id_jenisk','=','detail_member.id_jenisk')
        ->where('header_member.id_member',$id_member)->first();
        return view('detail_member',[
            'nama'=>$nama,
            'pict'=>$pict,
            'data'=>$data
        ]);
        }
    }

    public function edit_member($id_member){
        $nama = Session::get('nama');
        $pict=Session::get('pict');
        $hakakses=Session::get('hakakses');
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }elseif ($hakakses =='karyawan') {
            return redirect('/data_petugas')->with('alert','Anda Tidak Bisa Mengedit');
        }else {
            $jenis=DB::table('jenis_kendaraan')->get();
            $cari=DB::table('header_member')->join('detail_member','header_member.id_member','=','detail_member.id_member')
            ->join('jenis_kendaraan','jenis_kendaraan.id_jenisk','=','detail_member.id_jenisk')
            ->where('header_member.id_member',$id_member);
            $cariC=$cari->count();
            $cariD=$cari->first();

            return view('edit_member',[
                'cariD'=>$cariD,
                'pict'=>$pict,
                'jenis'=>$jenis,
                'hakakses'=>$hakakses,
                'nama'=>$nama
            ]);
        }
    }

    public function simpan_edit_member(Request $req){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            $id=$req->id_member;
            $nama=$req->name;
            $nik=$req->nik;
            $email=$req->email;
            $no_tlfn=$req->no_tlfn;
            $jk=$req->jk;
            $agama=$req->agama;
            $alamat=$req->alamat;
            $saldo=$req->saldo;

            $jenisK=$req->jenis_kendaraan;
            $namaK=$req->nama_kendaraan;
            $no_plat=$req->no_plat;
            $tahunK=$req->tahun_kendaraan;
            $no_rangka=$req->no_rangka;
            $Tpict=$req->Npict;

            if ($Tpict=='') {
                $updateH=[
                    'nik'=>$nik,
                    'nama'=>$nama,
                    'email'=>$email,
                    'jk'=>$jk,
                    'agama'=>$agama,
                    'alamat'=>$alamat,
                    'no_tlfn'=>$no_tlfn,
                    'saldo'=>$saldo
                ];
                $updateD=[
                    'id_jenisk'=>$jenisK,
                    'no_plat'=>$no_plat,
                    'nama_kendaraan'=>$namaK,
                    'tahun'=>$tahunK,
                    'no_rangka'=>$no_rangka
                ];
                DB::table('header_member')->where('id_member',$id)->update($updateH);
                DB::table('detail_member')->where('id_member',$id)->update($updateD);
                log::insertlog('Update Member'." ".$nama,'');
                return redirect('/data_member')
                    ->with("successalert","Berhasil Mengupdate Data Member Dengan Nama"." ".$nama);
            }else {

                $data=DB::table('detail_member')->where('id_member',$id)->first();
                File::delete('image/foto_kendaraan/'.$data->foto);
                //foto
                $angka=range(0,9);
                shuffle($angka);
                $pictA=array_rand($angka,5);
                $pictAstring=implode($pictA);
                $pictAacak=$pictAstring;

                $pict=$req->file('pict');
                $npict=$pict->getClientOriginalName();
                $Npict=$pictAacak.$npict;
                $pict->move(public_path().'/image/foto_kendaraan',$pictAacak.$npict);

                $updateH=[
                    'nik'=>$nik,
                    'nama'=>$nama,
                    'email'=>$email,
                    'jk'=>$jk,
                    'agama'=>$agama,
                    'alamat'=>$alamat,
                    'no_tlfn'=>$no_tlfn,
                    'saldo'=>$saldo
                ];
                $updateD=[
                    'id_jenisk'=>$jenisK,
                    'no_plat'=>$no_plat,
                    'nama_kendaraan'=>$namaK,
                    'tahun'=>$tahunK,
                    'no_rangka'=>$no_rangka,
                    'foto'=>$Npict
                ];
                DB::table('header_member')->where('id_member',$id)->update($updateH);
                DB::table('detail_member')->where('id_member',$id)->update($updateD);
                log::insertlog('Update Member'." ".$nama,'');
                return redirect('/data_member')
                    ->with("successalert","Berhasil Mengupdate Data Member Dengan Nama"." ".$nama);
            }
        }
    }

    public function delete_member($id_member){
        $status = Session::get('status');
        $hakakses=Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            $cari=DB::table('header_member')->join('detail_member','header_member.id_member','=','detail_member.id_member')
            ->where('header_member.id_member',$id_member);
            $cariC=$cari->count();
            $cariD=$cari->first();
            if ($cariC>=1 AND $hakakses == 'admin') {
                //log
                log::insertlog('Hapus Member'." ".$cariD->nama,'');
                //delete
                    File::delete('image/foto_kendaraan/'.$cariD->foto);
                DB::table('detail_member')->where('id_member',$id_member)->delete();
                DB::table('header_member')->where('id_member',$id_member)->delete();
                return redirect('/data_member')
                    ->with("successalert","Berhasil Menghapus Data Member Dengan Nama"." ".$cariD->nama);
            }else {
                return redirect('/data_member')->with("alert","Anda Tidak Bisa Menghapus Data Ini");
            }
        }
    }
}
