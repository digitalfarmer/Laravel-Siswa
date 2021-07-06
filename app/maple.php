<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maple extends Model
{
    //
    protected $table ='maple';
    protected $fillable = ['kode','nama', 'semester'];

    public function siswa(){
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }

    public function guru(){
        return $this->belongsTo(Guru::class);
    }
}
