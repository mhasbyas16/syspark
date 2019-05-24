<?php
namespace App\Helpers;
use DB;
use App\Helpers\waktu;
use Illuminate\Support\Facades\Session;

class log {
    public static function insertlog($value,$data){
        $tanggal = waktu::gettanggal('Y-m-d');
        $jam = waktu::getjam('H:i:s');

        if (\Session::has('id_petugas')) {
            $id = Session::get('id_petugas');
            $simpan=DB::table('log')->insert([
                'id_petugas'=>$id,
                'tanggal'=>$tanggal,
                'jam'=>$jam,
                'deskripsi'=>$value
                ]);
        }else{
            $isiD = DB::table('header_petugas')->join('detail_petugas','header_petugas.id_petugas','=','detail_petugas.id_petugas')->where('header_petugas.id_petugas',$data)->first();
            $simpan=DB::table('log')->insert([
                'id_petugas'=>$isiD->id_petugas,
                'tanggal'=>$tanggal,
                'jam'=>$jam,
                'deskripsi'=>$value
            ]);
        }
        return $simpan;
    }
}

 ?>
