<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Video extends Model
{
    protected $table = 'video';
    protected $fillable = ['judul','link_video','published'];
}
