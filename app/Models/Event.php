<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Uuid;

class Event extends Model
{
	use Uuid;
	use Sluggable;
    protected $table = 'event';
    protected $fillable = ['nama_event','tgl_event','lokasi','deskripsi','published','uuid'];

    public function sluggable()
    {
        return [
            'event_seo' => [
                'source' => 'nama_event'
            ]
        ];
    }
}
