<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Siswa;

class SiteController extends Controller
{
    public function home(){
        return view('sites.home');
    }
    public function daftarppdb()
    {
        return view('sites.ppdb');
    }
    public function postregister(Request $request){

        $user=  new User();
        $user->role='siswa';
        $user->name=$request->nama_depan;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id'=>$user->id]);
        $siswa = Siswa::create($request->all());
        $siswa->save();

        return redirect('/daftarppdb')->with('sukses','Data Berhasil di Simpan');
    }
}
