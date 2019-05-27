<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	public function Dashboard(){
		return view('dashboard');
	}
	public function Mainmenu(){
        $nama=Session::get('nama');
        $pict=Session::get('pict');
		return view('main',['nama'=>$nama,'pict'=>$pict]);
	}
	public function Datapegawai(){
		return view('pegawai');
	}
	public function Datakendaraan(){
		return view('kendaraan');
	}
	public function Dataparkir(){
		return view('parkir');
	}
	public function Datamember(){
		return view('member');
	}
	public function Reportdaily(){
		return view('daily');
	}
	public function Reportmonthly(){
		return view('monthly');
	}
	public function Reportchart(){
		return view('chart');
	}
	public function Settingan(){
		return view('setting');
	}
}
