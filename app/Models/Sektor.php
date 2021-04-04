<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Cviebrock\EloquentSluggable\Sluggable;

class Sektor extends Model
{
	use Uuid;
    use HasFactory;
    use Sluggable;
    protected $table = 'sektor';
    protected $fillable = ['nama_sektor','seo_sektor'];

    public function pelaku_ekraf(){
        return $this->hasMany(Pelaku_ekraf::class);
    }

    public function sluggable()
    {
        return [
            'seo_sektor' => [
                'source' => 'nama_sektor'
            ]
        ];
    }
}
