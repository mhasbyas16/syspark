<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
//login Controller
Route::get('/','logincontroller@Index');//awalan login
Route::post('/login','logincontroller@validasi');
Route::get ('/logout','logincontroller@logout');
Route::get ('/dashboard_admin','logincontroller@dashboard');
Route::get ('/signup','logincontroller@signup');
//end

//pegawai Controller
Route::get('/data_petugas','pegawaicontroller@petugas');
Route::get('/detail_petugas/{id_petugas}','pegawaicontroller@detail_petugas');
Route::post('/simpan_petugas','pegawaicontroller@simpan_petugas');
Route::get('/delete_petugas/{id_petugas}','pegawaicontroller@delete_petugas');
Route::get('/edit_petugas/{id_petugas}','pegawaicontroller@edit_petugas');
Route::post('/simpan_edit_petugas','pegawaicontroller@simpan_edit_petugas');
Route::get('/tambah_petugas','pegawaicontroller@tambah_petugas');
//end

//member Controller
Route::get('/data_member','membercontroller@member');
Route::get('/tambah_member','membercontroller@tambah_member');
Route::post('/simpan_member','membercontroller@simpan_member');
Route::get('/detail_member/{id_member}','membercontroller@detail_member');
Route::get('/edit_member/{id_member}','membercontroller@edit_member');
Route::post('/simpan_edit_member','membercontroller@simpan_edit_member');
Route::get('/delete_member/{id_member}','membercontroller@delete_member');
//end

//biaya Controller
Route::get('/data_biaya','biayacontroller@biaya');
Route::post('/simpan_biaya','biayacontroller@simpan_biaya');
Route::get('/tambah_biaya','biayacontroller@tambah_biaya');
Route::get('/delete_biaya/{id_biaya}','biayacontroller@delete_biaya');
Route::get('/edit_biaya/{id_biaya}/{id_jenisk}','biayacontroller@edit_biaya');
Route::post('/simpan_edit_biaya','biayacontroller@simpan_edit_biaya');
//end

//kendaraan Controller
Route::get('/data_kendaraan','kendaraancontroller@data_kendaraan');
Route::get('/tambah_kendaraan','kendaraancontroller@tambah_kendaraan');
Route::get('/delete_kendaraan/{id_jenisk}','kendaraancontroller@delete_kendaraan');
Route::get('/edit_kendaraan/{id_jenisk}','kendaraancontroller@edit_kendaraan');
Route::post('/simpan_edit_kendaraan','kendaraancontroller@simpan_edit_kendaraan');
Route::post('/simpan_kendaraan','kendaraancontroller@simpan_kendaraan');
//end

Route::get('/history','LogController@Log');//histroy

Route::get('/profile/{a}','Controller@viewProfile');//akses profile menu
Route::post('/saveProfile','Controller@saveProfile');//akses data profile

Route::get('/monthly','monthly@Reportmonthly');//akses data pegawai

Route::get('/dash','Controller@Dashboard');//setelah login masuk dashboard
Route::get('/main','Controller@Mainmenu');//akses main menu
Route::get('/gawai','Controller@Datapegawai');//akses data pegawai
Route::get('/kendaraan','Controller@Datakendaraan');//akses data kendaraan
Route::get('/parkir','Controller@Dataparkir');//akses data parkir
Route::get('/member','Controller@Datamember');//akses data member
Route::get('/daily','Controller@Reportdaily');//akses main menu
Route::get('/chart','Controller@Reportchart');//akses data kendaraan
Route::get('/setting','Controller@Settingan');//akses data parkir
