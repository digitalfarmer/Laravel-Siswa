<?php

namespace App\Http\Controllers;

use App\Exports\SiswasExport;
use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use App\maple;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->all());
        if($request->has('cari')){
            $data_siswa = Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa= Siswa::all();
        }
        //$siswa = Siswa::All();
        return view('siswa.listsiswa')->with('siswas', $data_siswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        //validation
        $this->validate($request, [
            'nama_depan'=>'required|min:5',
            'email'=>'required|email|unique:users',
            'avatar'=>'mimes:jpg,png',
        ]);
        //INsert Ke table User
        $user=  new User();
        $user->role='siswa';
        $user->name=$request->nama_depan;
        $user->email= $request->email;
        $user->password= bcrypt('user123');
        $user->remember_token = str_random(60);
        $user->save();

        //Insert ke Table Siswa
        $request->request->add(['user_id'=>$user->id]);
        $siswa = Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            # code...
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/siswa')->with('sukses','Data Berhasil di Simpan');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
        //$siswa= Siswa::find($id);
        return view('siswa.editsiswa',['siswa'=>$siswa]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $siswa= Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            # code...
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','Data Berhasil di Delete');
    }
    public function profile(Siswa $siswa)
    {
        # code...

        $matapelajaran= maple::all();

        //data untuk chart
        $categories=[];
        $data=[];
        foreach ($matapelajaran as $mp){
            if($siswa->maple()->wherePivot('maple_id',$mp->id)->first()){
                $categories[]=$mp->nama;
                $data[]=$siswa->maple()->wherePivot('maple_id',$mp->id)->first()->pivot->nilai;
            }
        }

        //return view('siswa.profile-siswa')->with('profilesiswa',$profilesiswa);
        return view('siswa.profile-siswa',
            ['siswa'=>$siswa,
                'matapelajaran'=>$matapelajaran,
                'categories'=>$categories,
                'data'=>$data
            ]
        );
    }
        //add nilai
    public function addnilai(Request $request, $idsiswa){
        //dd($request->all());
        $siswa = Siswa::find($idsiswa);
        if($siswa->maple()->where('maple_id',$request->mapel)->exists()){
            return redirect('/siswa/'.$idsiswa.'/profile')->with('error','Matapelajaran sudah di tambahkan');
        }
        $siswa->maple()->attach($request->maple,['nilai'=>$request->nilai]);
        return redirect('/siswa/'.$idsiswa.'/profile')->with('sukses','Nilai Berhasil di Simpan');
    }
    protected function deletenilai($idsiswa,$idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->maple()->detach($idmapel);
        return redirect()->back()->with('sukses','Data Nilai berhasil di hapus');
    }


//export to excel
    public function export()
    {
        //$filesiswa=Excel::download( new SiswasExport, 'daftarsiswa.xlsx');
       // dd($filesiswa);
        return Excel::download( new SiswasExport, 'daftarsiswa.xlsx');
    }
    //exporttopdf
    public function exportpdf()
    {
        $siswa=Siswa::all();

        //$pdf = PDF::loadHTML($siswa);
        $pdf = PDF::loadView('export.siswapdf',['siswa'=>$siswa]);
        return $pdf->download('siswa.pdf');
    }

}
