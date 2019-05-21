<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\waktu;
use DB;
class logincontroller extends Controller
{
    public function Index(){
        if (\Session::has('status')) {
            return redirect('/dashboard_admin');
        }else {
            return view('login');
        }
	}

    public function validasi(Request $req){
        $username = $req->username;
        $password = md5($req->password);
        $data = DB::table('header_petugas')->join('detail_petugas','header_petugas.id_petugas','=','detail_petugas.id_petugas')->where('header_petugas.id_petugas',$username);
        $jmlD = $data->count();
        $isiD = $data->first();

        if ($jmlD>=1) {
            if ($isiD->id_petugas==$username) {
                if ($isiD->password==$password) {
                    if ($isiD->status=='login' ) {
                        return redirect('/')->with('alert','Your Account Has Login Another Place, Call Admnistrator For Help');
                    }else{
                        $tanggal = waktu::gettanggal('Y-m-d');
                        $jam = waktu::getjam('H:i:s');
                        DB::table('header_petugas')->where('id_petugas',$username)->update(['status'=>'login']);
                        $status = DB::table('header_petugas')->where('id_petugas',$username)->first();
                        DB::table('log')->insert([
                            'id_petugas'=>$isiD->id_petugas,
                            'tanggal'=>$tanggal,
                            'jam'=>$jam,
                            'deskripsi'=>'Login'
                        ]);
                        //session
                        Session::put('id_petugas',$isiD->id_petugas);
                        Session::put('password',$isiD->password);
                        Session::put('hakakses',$isiD->hakakses);
                        Session::put('nik',$isiD->nik);
                        Session::put('nama',$isiD->nama);
                        Session::put('jk',$isiD->jk);
                        Session::put('agama',$isiD->agama);
                        Session::put('alamat',$isiD->alamat);
                        Session::put('no_tlfn',$isiD->no_tlfn);
                        Session::put('pict',$isiD->pict);
                        Session::put('status',$status->status);

                        return redirect('/dashboard_admin');
                    }
                }else {
                    return redirect('/')->with('alert','Your Password Is Wrong Try Again');
                }
            }else {
                return redirect('/')->with('alert','Your Username Is Wrong Try Again');
            }
        }else {
            return redirect('/')->with('alert','Your Username And Password Is Wrong Try Again');
        }
    }

    public function dashboard(){
        $status = Session::get('status');
        if ($status =='logout' OR $status =='') {
            return redirect('/');
        }else {
            Session::get('id_petugas');
            Session::get('password');
            Session::get('hakakses');
            Session::get('nik');
            $nama=Session::get('nama');
            Session::get('jk');
            Session::get('agama');
            Session::get('alamat');
            Session::get('no_tlfn');
            Session::get('pict');
            return view('dashboard',[
                'nama'=>$nama
            ]);
        }
    }

    public function Logout(){
        $id = Session::get('id_petugas');
        $tanggal = waktu::gettanggal('Y-m-d');
        $jam = waktu::getjam('H:i:s');
        DB::table('header_petugas')->where('id_petugas',$id)->update(['status'=>'logout']);
        DB::table('log')->insert([
            'id_petugas'=>$id,
            'tanggal'=>$tanggal,
            'jam'=>$jam,
            'deskripsi'=>'Logout'
        ]);
        Session::flush();
        return redirect('/');
    }

    public function signup(){
        return view ('register');
    }
}
