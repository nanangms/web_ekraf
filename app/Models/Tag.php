<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\Uuid;
class Tag extends Model
{
	use Uuid;
    use HasFactory;
    use Sluggable;
    protected $table = 'tag';
    protected $fillable = ['nama_tag','tag_seo','uuid'];

    public function sluggable()
    {
        return [
            'tag_seo' => [
                'source' => 'nama_tag'
            ]
        ];
    }
}
