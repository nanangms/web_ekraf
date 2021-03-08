<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Uuid;

class Berita extends Model
{
    protected $table = 'berita'; 
    protected $fillable = ['judul','judul_seo','published','isi','gambar','dibaca','user_id']; 

    use Sluggable;

    public function sluggable()
    {
        return [
            'judul_seo' => [
                'source' => 'judul'
            ]
        ];
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }  

    public function getImageBerita(){
        if(!$this->gambar){
            return asset('images/berita/no-berita.jpg');
        }
        return asset('images/berita/'.$this->gambar);
    }
}
