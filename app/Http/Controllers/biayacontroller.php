<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\log;
use DB;

class biayacontroller extends Controller
{
    public function biaya(){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        $nama=Session::get('nama');
        $pict=Session::get('pict');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else{
            $biaya=DB::table('biaya')->join('jenis_kendaraan','biaya.id_jenisk','=','jenis_kendaraan.id_jenisk')->get();
            return view('data_biaya',[
                'nama'=>$nama,
                'hakakses'=>$hakakses,
                'biaya'=>$biaya,
                'pict'=>$pict
            ]);
        }
    }

    public function tambah_biaya(){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else{
            $jenisk=DB::table('jenis_kendaraan')->get();
            return view('tambah_biaya',[
                'hakakses'=>$hakakses,
                'jenisk'=>$jenisk
            ]);
        }
    }

    public function simpan_biaya(Request $req){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else{
            $idK=$req->jenisk;
            //menit gratis
            $menitg_h=$req->menitg_h;
            $menitg_m=$req->menitg_m;
            $menitg=$menitg_h.":".$menitg_m;
            //jam Pertama
            $jamp_h=$req->jamp_h;
            $jamp_m=$req->jamp_m;
            $jamp=$jamp_h.":".$jamp_m;
            //jam Berikutnya
            $jamb_h=$req->jamb_h;
            $jamb_m=$req->jamb_m;
            $jamb=$jamb_h.":".$jamb_m;

            $biaya_p=$req->biaya_p;
            $biaya_b=$req->biaya_b;
            $tipe=$req->tipe;

            $save=['menit_g'=>$menitg,
                    'jam_p'=>$jamp,
                    'jam_b'=>$jamb,
                    'biaya_p'=>$biaya_p,
                    'biaya_b'=>$biaya_b,
                    'tipe'=>$tipe,
                    'id_jenisk'=>$idK];
            log::insertlog('Menambahkan Data Biaya','');
            DB::table('biaya')->insert($save);
            return redirect('/data_biaya')->with('successalert','Berhasil Menambahkan Data Biaya');
        }
    }

    public function delete_biaya($id_biaya){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else{
            log::insertlog('Menghapus Data Biaya','');
            DB::table('biaya')->where('id_biaya',$id_biaya)->delete();
            return redirect('/data_biaya')->with('successalert','Berhasil Menghapus Data');
        }
    }

    public function edit_biaya($id_biaya, $id_jenisk){
        $status = Session::get('status');
        $hakakses = Session::get('hakakses');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else{
        $data=DB::table('biaya')
              ->select('biaya.*','jenis_kendaraan.*', DB::raw('MID(menit_g,4,2) AS menitg_g_M, LEFT(menit_g,2) AS menitg_g_H, MID(jam_p,4,2) AS jam_p_M, LEFT(jam_p,2) AS jam_p_H, MID(jam_b,4,2) AS jam_b_M, LEFT(jam_b,2) AS jam_b_H'))
              ->join('jenis_kendaraan','biaya.id_jenisk','=','jenis_kendaraan.id_jenisk')
              ->where('id_biaya',$id_biaya)->where('biaya.id_jenisk',$id_jenisk)->first();
        $jenisk=DB::table('jenis_kendaraan')->get();
        return view('edit_biaya',[
            'hakakses'=>$hakakses,
            'jenisk'=>$jenisk,
            'data'=>$data
        ]);
        }
    }

    public function simpan_edit_biaya(Request $req){
        $status = Session::get('status');
        $pict=Session::get('pict');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else{
            $id_biaya=$req->id_biaya;
            $idK=$req->jenisk;
            //menit gratis
            $menitg_h=$req->menitg_h;
            $menitg_m=$req->menitg_m;
            $menitg=$menitg_h.":".$menitg_m;
            //jam Pertama
            $jamp_h=$req->jamp_h;
            $jamp_m=$req->jamp_m;
            $jamp=$jamp_h.":".$jamp_m;
            //jam Berikutnya
            $jamb_h=$req->jamb_h;
            $jamb_m=$req->jamb_m;
            $jamb=$jamb_h.":".$jamb_m;

            $biaya_p=$req->biaya_p;
            $biaya_b=$req->biaya_b;
            $tipe=$req->tipe;

            $save=['menit_g'=>$menitg,
                    'jam_p'=>$jamp,
                    'jam_b'=>$jamb,
                    'biaya_p'=>$biaya_p,
                    'biaya_b'=>$biaya_b,
                    'tipe'=>$tipe,
                    'id_jenisk'=>$idK];
            log::insertlog('Mengedit Data Biaya','');
            DB::table('biaya')->where('id_biaya',$id_biaya)->update($save);
            return redirect('/data_biaya')->with('successalert','Berhasil Mengedit Data Biaya');
        }
    }
}
