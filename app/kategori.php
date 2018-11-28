<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table ='kategoris';
    protected $fillable = ['nama_kategori'];
    public $timestamps = true;

    public function table_barang()
    {
        return $this->HasMany('App\kategori','kategori_id');
    }
}
