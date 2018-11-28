<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class table_barang extends Model
{
    protected $table ='table_barangs';
    protected $fillable = ['nama_barang','kategori_id','gambar','deskripsi'];
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo('App\kategori','kategori_id');
    }
}
