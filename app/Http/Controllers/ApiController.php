<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function editnilai(Request  $request,$id)
    {
        $siswa= \App\Siswa::find($id);
        $siswa->maple()->updateExistingPivot($request->pk,['nilai'=>$request->value]);
        return $request->all();
    }
}
