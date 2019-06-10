<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgotPassword;
use App\Mail\SecurityAlert;
use Khill\Lavacharts\Lavacharts;
use DB;
use Config;
use App\header_parkir;
use App\detail_masuk;
use File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
	public function Dashboard(){
		return view('dashboard');
	}
	public function Mainmenu(){
		$table = DB::table('header_parkir')->select('header_parkir.id_parkir', 'header_parkir.id_petugas', 'detail_masuk.tanggal_masuk', 'detail_masuk.jam_masuk', 'detail_masuk.foto')->join('detail_masuk', 'header_parkir.id_parkir', '=', 'detail_masuk.id_parkir')->get();
		$table2 = DB::table('header_parkir')->select('header_parkir.id_parkir', 'header_parkir.id_petugas', 'detail_keluar.tanggal_keluar', 'detail_keluar.jam_keluar', 'detail_keluar.foto')->join('detail_keluar', 'header_parkir.id_parkir', '=', 'detail_keluar.id_parkir')->get();
		$table3 = DB::table('header_parkir')->select('header_parkir.id_parkir', 'header_parkir.id_petugas', 'detail_keluar.tanggal_keluar', 'detail_keluar.jam_keluar', 'detail_keluar.foto')->join('detail_keluar', 'header_parkir.id_parkir', '=', 'detail_keluar.id_parkir')->get();


		$table4 = DB::table('jenis_kendaraan')->get();

		$id_parkir = DB::table('header_parkir')->max('id_parkir');
		$id = DB::table('detail_masuk')->max('id');
		return view('main',[
			'tbl' => $table,
			'tbl2' => $table2,
			'tbl3' => $table3,
			'tbl4' => $table4,
			'id_parkir' => $id_parkir,
			'id' => $id
		]);
	}

	public function Park(request $r){
		$action = $r->action;
		$id_parkir = $r->id_parkir;
		$id_jenisk = $r->id_jenisk;
		$id = $r->id;
		$tanggal = date('Y-m-d');
		$jam = $r->jam;
		$no_plat = $r->no_plat;
		if ($action == "in") {

			if (isset($r->id_member)) {
				$tipe = "member";
			}else{
				$tipe = "non";
			}
			//FOTO
			if($r->hasFile('pict')) {
				$data = $r->input('pict');
				$photo = $r->file('pict')->getClientOriginalName();
				$destination = base_path() . '/image/park';
				$r->file('pict')->move($destination, $photo);
			}else {
				$photo = 'a';
			}
			$data = [
				'id_parkir' => $id_parkir,
				'id_jenisk' => $id_jenisk,
				'tipe' => $tipe,
				'no_plat' => $no_plat,
				'status' => 'in'
			];

			header_parkir::insert($data);
			$data = [
				'id_parkir' => $id_parkir,
				'id' => $id,
				'jam_masuk' => $jam,
				'tanggal_masuk' => $tanggal,
				'foto' => $photo
			];

			detail_masuk::insert($data);

		}elseif ($action == "out") {
			$action = $r->action;

			if ($action == "Proses") {
				echo "Proses";
			}elseif ($action == "Keluar") {
				echo "Keluar";
			}

		}

		return redirect('/main');
	}

	public function viewProfile($a){
		$aksi = $a;
		$id = Session::get('id_petugas');
		$table = DB::table('detail_petugas')->select('detail_petugas.id_petugas', 'nik', 'nama', 'detail_petugas.status as s', 'no_tlfn', 'jumlah_anak', 'alamat', 'email', 'jk', 'password', 'agama', 'pict', 'header_petugas.status as st', 'hakakses')->join('header_petugas', 'detail_petugas.id_petugas', '=', 'header_petugas.id_petugas')->where('detail_petugas.id_petugas', '=', $id)->get();
		return view('profileView', [
			'tbl' => $table,
			'aksi' => $aksi
		]);
	}

	public function saveProfile(request $r){
		$id_petugas = Session::get('id_petugas');
		$nama = $r->nama;
		$status = $r->status;
		$no_tlfn = $r->no_tlfn;
		$jumlah_anak = $r->jumlah_anak;
		$agama = $r->agama;
		$alamat = $r->alamat;
		$email = $r->email;
		$jk = $r->jk;

		if (Session::get('hakakses') == "admin") {
			$data = [
				'nama' => $nama,
				'status' => $status,
				'no_tlfn' => $no_tlfn,
				'jumlah_anak' => $jumlah_anak,
				'agama' => $agama,
				'alamat' => $alamat,
				'email' => $email,
				'jk' => $jk
			];
            detail_petugas::where('id_petugas', $id_petugas)->update($data);
		}
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
