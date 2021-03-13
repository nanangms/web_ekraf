<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Badanhukum extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'badan_hukum';
    protected $fillable = ['nama_badan_hukum','uuid'];

}
