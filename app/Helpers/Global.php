<?php
use App\Siswa;
use App\Guru;

function peringkat5(){
    $siswas= Siswa::all();
    //helper laravel
    $siswas->map(function($siswa){
        $siswa->rata2nilai= $siswa->rerata();
        return $siswa;
    });
    $siswas=$siswas->sortByDesc('rata2nilai')->take(5);
    return $siswas;
}
function jumlahMurid(){
    return Siswa::count();
}

function jumlahGuru(){
    return Guru::count();
}
