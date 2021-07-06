<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $id='id';
    protected $table='guru';
    protected $fillable =[
        'nama',
        'telp',
        'alamat'
    ];

    public function mapel(){
        return $this->hasMany(Maple::class);
    }

}
