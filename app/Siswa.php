<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{
    protected $table= 'siswas';
    protected $id= 'id';
    protected $fillable= [
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'agama',
        'alamat',
        'avatar',
        'user_id'
    ];

    public function getAvatar()
    {
        # code...
        if (!$this->avatar) {
            # code...
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function maple(){
        return $this->belongsToMany(Maple::class)->withPivot(['nilai'])->withTimestamps();
    }
    public function rerata(){
        $total=0;
        $num=0;
        foreach ($this->maple as $map){
            $total +=  $map->pivot->nilai;
            $num++;

        }
       // return round($total/$num);
    }
    public function nama_lengkap(){
        return $this->nama_depan.' '.$this->nama_belakang;
    }


}
