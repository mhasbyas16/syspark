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
Route::get('/tambah_petugas',function(){
    return view('register');
});
//end

Route::get('/dash','Controller@Dashboard');//setelah login masuk dashboard
Route::get('/main','Controller@Mainmenu');//akses main menu
Route::get('/gawai','Controller@Datapegawai');//akses data pegawai
Route::get('/kendaraan','Controller@Datakendaraan');//akses data kendaraan
Route::get('/parkir','Controller@Dataparkir');//akses data parkir
Route::get('/member','Controller@Datamember');//akses data member
Route::get('/daily','Controller@Reportdaily');//akses main menu
Route::get('/monthly','Controller@Reportmonthly');//akses data pegawai
Route::get('/chart','Controller@Reportchart');//akses data kendaraan
Route::get('/setting','Controller@Settingan');//akses data parkir
