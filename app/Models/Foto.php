<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Foto extends Model
{
    use Uuid;
    protected $table = 'foto'; 
    protected $fillable = ['judul','judul_seo','published','isi','gambar','dibaca','user_id','uuid']; 

    public function getImageFoto(){
        if(!$this->gambar){
            return asset('images/foto/no-foto.jpg');
        }
        return asset('images/foto/'.$this->gambar);
    }
}
