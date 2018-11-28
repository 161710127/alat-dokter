<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    protected $table ='gambars';
    protected $fillable = ['nama_gambar','gambar'];
    public $timestamps = true;

    public function gambar()
    {
        return $this->HasMany('App\gambar','gambar_id');
    }
}
