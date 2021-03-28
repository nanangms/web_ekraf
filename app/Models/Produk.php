<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Produk extends Model
{
	use Uuid;
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = ['kode_pelaku_ekraf','nama_produk','deskripsi','harga','gambar','uuid'];

    public function getImageProduk(){
        if(!$this->gambar){
            return asset('images/no_ekraf.jpg');
        }
        return asset('images/produk/thumb/'.$this->gambar);
    }

    public function pelaku_ekraf()
    {
        return $this->belongsTo('App\Models\Pelaku_ekraf');
    }
}
