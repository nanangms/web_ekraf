<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
class Album extends Model
{
	use Uuid;
    use HasFactory;
    protected $table = 'album';
    protected $fillable = ['nama_album','published','uuid'];
}
