<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Uuid;

class Event extends Model
{
	use Uuid;
    use HasFactory;
	use Sluggable;
    protected $table = 'event';
    protected $fillable = ['nama_event','tgl_event','foto_banner','lokasi','deskripsi','published','uuid'];

    public function sluggable()
    {
        return [
            'event_seo' => [
                'source' => 'nama_event'
            ]
        ];
    }

    public function getImageEvent(){
        if(!$this->foto_banner){
            return asset('images/no_ekraf.jpg');
        }
        return asset('images/event/'.$this->foto_banner);
    }
}
