<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use Illuminate\Support\Facades\Session;

class LogController extends BaseController
{
	public function Log(){
		$nama = Session::get('nama');
		$data = DB::table('log')->join('detail_petugas', 'log.id_petugas', '=', 'detail_petugas.id_petugas')->get();
		return view('loghistory', [
			'data'=>$data,
			'nama'=>$nama]);
	}
}
