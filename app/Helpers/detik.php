<?php
namespace App\Helpers;

class detik {
    public static function konvertDM($detik){
        //konvert detik ke jam menit detik
        $jam = floor($detik/3600);

        //Untuk menghitung jumlah dalam satuan menit:
        $sisa = $detik% 3600;
        $menit = floor($sisa/60);

        //Untuk menghitung jumlah dalam satuan detik:
        $sisa = $detik % 60;
        $detik = floor($sisa/1);

        $waktu=$jam.':'.$menit.':'.$detik;

        return $waktu;
    }
}

 ?>
