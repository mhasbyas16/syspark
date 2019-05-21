<?php
namespace App\Helpers;

class waktu {
    public static function gettanggal($format){
        $now = \Carbon\Carbon::now('Asia/Jakarta');
        $tanggal = $now->format($format);
        return $tanggal;
    }
    public static function getjam($format){
        $now = \Carbon\Carbon::now('Asia/Jakarta');
        $jam = $now->format($format);
        return $jam;
    }
}

 ?>
